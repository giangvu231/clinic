<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalBill;
use App\reOrder;
use App\Template;
use App\History;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use Storage;
use File;



class reOrderController extends Controller
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
    public function index(Request $request)
  
    {
        $medical_bills = MedicalBill::latest();
        
        if($request->patient_id) {
            $medical_bills = $medical_bills->where('patient_id','like','%'.$request->patient_id.'%');
        }
        $medical_bills = $medical_bills->paginate(50);

        $file = fopen($this->pathUrl, "r") or die("Unable to open file!");
        $url2 = fgets($file);
        fclose($file);
        return view('users.reorder', compact('medical_bills'));
    }
        


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   	public function getReOrder(Request $request)
    {
        $medical_bill = MedicalBill::where('accession_number', $request->accession_number)->first();
        if(!$medical_bill) return view('users.404');
        return view('users.reorder', compact('medical_bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = DB::table('users')->where('id','=',Auth::id())->first();

        //tiền khám lại
        $ngay_vao           = $request->input('ngay_vao'); 
        $dt = Carbon::now();
        $dt1 = $dt->subDays(1);               
        $today = now();       
        $mt = Carbon::now();                       
        $dt5 = $mt->subDays(5);

        if($ngay_vao < $dt5){
            $tien_kham = 200000;
        }elseif($ngay_vao < $dt1 &&  $ngay_vao > $dt5 ){
            $tien_kham = 100000;
        }elseif($ngay_vao < $today &&  $ngay_vao > $dt1){
            $tien_kham = 0;
        }else{
            $tien_kham = 200000;
        }

        $patient_id           = $request->input('patient_id'); 
        $selectPid = DB::table('medical_bills')->where('patient_id', $patient_id)->count();
        $accNoNum = $selectPid + 1;
                
        if($accNoNum > 0 && $accNoNum < 10)
        {
            $acc_cut = substr($patient_id, 2);
        }
        else if($accNoNum >= 10 && $accNoNum < 100)
        {
           $acc_cut = substr($patient_id, 3);
        }
        else if($accNoNum >= 100 && $accNoNum < 1000)
        {
            $acc_cut = substr($patient_id, 4);
        } 
        else if($accNoNum >= 1000 && $accNoNum < 10000)
        {
           $acc_cut = substr($patient_id, 5);
        }
        else if($accNoNum >= 10000 && $accNoNum < 100000)
        {
            $acc_cut = substr($patient_id, 6);
        }
        else if($accNoNum >= 100000 && $accNoNum < 1000000)
        {
            $acc_cut = substr($patient_id, 7);
        }
        else if($accNoNum >= 1000000 && $accNoNum < 10000000)
        {
            $acc_cut = substr($patient_id, 8);
        }
        else if($accNoNum >= 10000000 && $accNoNum < 100000000)
        {
            $acc_cut = substr($patient_id, 9);
        }   
        $accNo = $acc_cut.$accNoNum;
                  
        $first_name           = $request->input('first_name');
       
        $sex                  = $request->input('sex');
        $can_nang             = $request->input('can_nang');        
        $address              = $request->input('address'); 
        $birth_date              = $request->input('birth_date'); 
        $chieu_cao              = $request->input('chieu_cao'); 
        $nhip_tim              = $request->input('nhip_tim');        
        $nhip_tho              = $request->input('nhip_tho'); 
        $huyet_ap              = $request->input('huyet_ap');
        $nhiet_do              = $request->input('huyet_ap');
        $spO2              = $request->input('spO2');       
        $reason               = $request->input('reason');       
        $schedule_date             = $request->input('schedule_date');

        $visit = $selectPid + 1;
        $vist_cut = substr($patient_id, 10);  
        $visit_number = $vist_cut.$visit;
        
       
        $ordering_doctor_name       = $request->input('radiologist_id');
        $ordering_doctor_id = $request->input('radiologist_bacsidoc');  
       
        $radiologist_id       = $request->input('radiologist_id');
        $radiologist_bacsidoc = $request->input('radiologist_bacsidoc');
        
        $data = array(
            'accession_number'     => $accNo,
            'patient_id'           => $patient_id,        

            'first_name'           => $first_name,
             'birth_date'           => $birth_date,
           
            'sex'                  => $sex,
            'can_nang'             => $can_nang,
            'address'              => $address,
           
            'chieu_cao'            => $chieu_cao,
            'nhip_tim'            => $nhip_tim,
            'nhip_tho'           => $nhip_tho,
            'reason'               => $reason,
            'huyet_ap'              => $huyet_ap,
            'nhiet_do'          => $nhiet_do,
            'spO2'              => $spO2,  
            'tien_kham'          => $tien_kham,          
            'radiologist_id'       => $radiologist_id,
            'radiologist_bacsidoc' => $radiologist_bacsidoc,

            // 'schedule_date'        => $schedule_date,
            'visit_number'              => $visit_number,
           
            'schedule_date' => date('Y-m-d H:i:s'), 
           
            'study_status' => '3', 
            'created_at' => date('Y-m-d H:i:s'), 
            'ordering_doctor_name' => $user->hoten, 
            'ordering_doctor_id' => $user->chung_thu_so
        );

        DB::table("medical_bills")->insert($data);
        return redirect('radiologist/reporting-page');
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
    public function update(Request $request, $id)
    {
        //
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
}
