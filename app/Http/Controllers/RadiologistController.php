<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalBill;
use App\ProductStock;
use App\Template;
use App\History;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;
use File;
use Auth;
use PDF;
use Dompdf\Dompdf;
use App\Supplies;

class RadiologistController extends Controller
{
    protected $medical_bill;
    private $pathUrl;

    public function __construct(MedicalBill $medical_bill)
    {
        $this->pathUrl = $_SERVER['DOCUMENT_ROOT'] . "/../config/url.conf";
        $this->medical_bill = $medical_bill;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function parseDate($dateString)
    {
        return Carbon::createFromFormat('d/m/Y', $dateString);
    }

    public function index(Request $request)
    {
        $medical_bills = MedicalBill::latest();
        
        $medical_bills_1 = MedicalBill::where('study_status',1)->paginate(5);
        $medical_bills_2 = MedicalBill::where('study_status',2)->paginate(5);
        $medical_bills_3 = MedicalBill::where('study_status',3)->paginate(5);
        // $loai_thiet_bi = DB::table('medical_bills')->select('loai_thiet_bi')->groupBy('loai_thiet_bi')->get();
        $templates = Template::all();
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;
        $today = date("Y-m-d");
        // Nếu là ngày hôm nay
        if(isset($_GET["today"])){
            $medical_bills = $medical_bills->whereDate('schedule_date', $today);
        }else if(isset($_GET["last_day"])){ // Nếu là 7 ngày trc
            $dt = Carbon::now();
            $from = $dt->subDays(7);
            $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $from)
            ->whereDate('schedule_date', '<=', $today);
        }else if(isset($request->date_from) && isset($request->date_to)){ // If có cả ngày từ và đến
            $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $dateFrom)
            ->whereDate('schedule_date', '<=', $dateTo);
        }else{
            if(isset($request->date_from)){
                $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $dateFrom);
            }
            if(isset($request->date_to)){
                $medical_bills = $medical_bills->whereDate('schedule_date', '<=', $dateTo);
            }
        }
        
        if($request->patient_id) {
            $medical_bills = $medical_bills->where('patient_id','like','%'.$request->patient_id.'%');
        }
        if($request->patient_name) {
            $name = $request->patient_name;
            $medical_bills = $medical_bills->whereRaw("concat(first_name, ' ', last_name) LIKE ?", ['%' .$name. '%']);
        }
        if($request->mota) {
            $medical_bills = $medical_bills->where('mota','like', '%'.$request->mota.'%');
        }
        if($request->access_id) {
            $medical_bills = $medical_bills->where('accession_number','like', '%'.$request->access_id.'%');
        }
        if($request->doctor_name) {
            $medical_bills = $medical_bills->where('ordering_doctor_name', 'like', '%'.$request->doctor_name.'%');
        }
        // if($request->ten_thiet_bi){
        //     $medical_bills = $medical_bills->where('loai_thiet_bi', 'like', '%'.$request->ten_thiet_bi.'%');
        // }
        $medical_bills = $medical_bills->paginate(50);

        $file = fopen($this->pathUrl, "r") or die("Unable to open file!");
        $url2 = fgets($file);
        fclose($file);


        return view('users.radiologist', compact('medical_bills','medical_bills_1','medical_bills_2','medical_bills_3','templates', 'url2'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $templates = Template::where('status',1)->get();
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
		if(!$medical_bill) return view('users.404');
        $medical_bill->update([
            'is_edited' => '1'
        ]);
        $history = new History();
        $history->user_id = getUserId();
        $history->medical_bill_id = $medical_bill->id;
        $history->save();

    	return view('users.radiologist_create',compact('medical_bill', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user_id)
    {
       $medical_bill = MedicalBill::findOrFail($id);
        $fix_mota = strip_tags($request->mota, '<p><b><i><u><ul><li><br><strong><div></div>');
        $fix_mota1 = str_replace(
            ['<p>','</p>'], 
            ['','<br>'], 
            $fix_mota
        );      
        if($medical_bill->study_status == 3 || $medical_bill->study_status == null) {
            $medical_bill->update(
                array_merge($request->all(), 
                ['mota' => $fix_mota1,
                'is_edited' => '1', 
                'study_status' => '3', 
                'radiologist_bacsidoc' => $request->user_hoten, 
                'radiologist_id' => $request->user_id])
            );
        }

        // createXML($medical_bill);
        $history = new History();
		// Auth::user() not working
        $history->user_id = $user_id;
        $history->medical_bill_id = $medical_bill->id;
        $history->save();
		
        createXML($medical_bill);

		return redirect()->route('get.radiologist.printer',['accession_number='.$medical_bill->accession_number ]);
        /*return response()->json([
            'data' => $medical_bill,
            'url'=> route('get.radiologist.printer')."?accession_number=".$medical_bill->accession_number 
        ], 200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxChonTemplate(Request $request)
    {
        
        $template = Template::where('TuDienKetQua_Id', $request->TuDienKetQua_Id)->first();

        if($template) {
            $data = $template->KetQua;
            $ket_luan = $template->KetLuan;
            $de_nghi = $template->de_nghi;
            if(!empty($data)){
                $data = rtfToHtml($data);
                if($data == -1){
                    $data = $template->KetQua_Text;
                }
            }
            else
                $data = $template->KetQua_Text;
            return response()->json([
                'data' => $data,
                'ket_luan' => $ket_luan,
                'de_nghi' => $de_nghi,
            ], 200);
        }
    }


    public function view(Request $request)
    {
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
		if(!$medical_bill) return view('users.404');
        return view('users.radiologist_view', compact('medical_bill'));
    }

    public function getImageView(Request $request)
    {
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
        if(!$medical_bill) return view('users.404');
        return view('users.radiologist_view-image', compact('medical_bill'));
    }

    public function getPatientInfoView(Request $request)
    {
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
        if(!$medical_bill) return view('users.404');
        return view('users.radiologist_view-patientinfo', compact('medical_bill'));
    }

    public function getDescriptionView(Request $request)
    {   
        DB::table("supplies")->where('so_luong','<=', 0)->update(['trang_thai' => '0']);
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
        $accession_number = $medical_bill->accession_number;
        // $product_stocks = DB::select('select * from product_stocks where medical_bill_id = ?', [$accession_number]);
        // $product_stocks = ProductStock::where('medical_bill_id', $accession_number)->get();
        // $supplies_id = $product_stocks->supplies_id;       
        $product_stocks = DB::table('product_stocks')->where('medical_bill_id',$accession_number)->get();
        // dd($product_stocks);
        //$kq = $medical_bill->created_at;
        //$kq1 = date_modify($kq, "+12 days");
        // $kq2 = date_format($kq,"H:i:s");
        // $kq =  $kq1."T".$kq2;
        //echo $kq1;
        if(!$medical_bill) return view('users.404');
        return view('users.radiologist_view-description', compact('medical_bill', 'product_stocks'));
    }

    public function postChangeStatus($id, Request $request) {
        $medical_bill = MedicalBill::findOrFail($id);
        $fix_mota = strip_tags($request->mota, '<p><b><i><u><ul><li><br><strong><div></div>');
        $fix_mota1 = str_replace(
            ['<p>','</p>'], 
            ['','<br>'], 
            $fix_mota
        );   
        $medical_bill = MedicalBill::findOrFail($id);
        $medical_bill->update(['study_status' => '4']);
        $history = new History();
        $history->user_id = getUserId();
        $history->medical_bill_id = $medical_bill->id;
        $history->save();
        createXML($medical_bill);
        return back();
    }

    public function UpdateStudyStatus($id, Request $request)
    {
        $medical_bill = MedicalBill::findOrFail($id);
        if($medical_bill->study_status == 1) 
        {
            $medical_bill->update(['study_status' => '2']);
        }
        else if($medical_bill->study_status == 2)
        {
            $medical_bill->update(['study_status' => '3']);
        }
        else if($medical_bill->study_status == 3) 
        {
            $medical_bill->update(['study_status' => '4']);
        }
        $history = new History();
        $history->user_id = getUserId();
        $history->medical_bill_id = $medical_bill->id;
        $history->save();
        // createXML($medical_bill);
        return back();
    }

    

    public function pdfexport(Request $request, $id)
    {
        $medical_bill = MedicalBill::findOrFail($id);
        $accession_number = $medical_bill->accession_number;
        $product_stocks = DB::select('select * from product_stocks where medical_bill_id = ?', [$accession_number]);
       
        $pdf = PDF::loadView("pdf.", ['medical_bill' => $medical_bill], ['product_stocks' => $product_stocks])->setPaper('A5', 'landscape');
        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);
        $name = $medical_bill->accession_number . '_' . $datetime;
        // $pdf->save(storage_path("pdf/".$name.".pdf"));
        //$pdf->save(public_path("pdf_export/".$name.".pdf"));
        //return response()->file(public_path("pdf_export/".$name.".pdf"));
        return $pdf->stream();
    }
    public function cancelMedicalRecord(Request $request, $id)
    {
        $medical_bill = MedicalBill::findOrFail($id);

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $medical_bill->study_status = '3';
        $medical_bill->cancel_time = $datetime;
        $medical_bill->cancel_name = Auth::user()->hoten;
        $medical_bill->cancel_id = Auth::user()->userid;

        $medical_bill->save();

        return back();
    }
    public function getDelmedical_bill($id){
    $medical_bill = MedicalBill::findOrfail($id);
    $medical_bill->delete();    
    return back()->with(['success', 'xóa thành công.']);
    }
}
