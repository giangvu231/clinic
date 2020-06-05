<?php

namespace App\Http\Controllers;

use App\MedicalBill;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Status;
use App\Level;
use App\Supplies;

class MedicalBillController extends Controller
{
    protected $medical_bills;

    public function __construct(MedicalBill $medical_bills)
    {
        $this->medical_bills = $medical_bills;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //Doanh thu theo tháng
        $thang = Carbon::now()->month;
        $tien_kham_ht = DB::table('medical_bills')->whereMonth('schedule_date', $thang)->sum('tien_kham');
        $tien_lai_thuoc = DB::table('posts')->whereMonth('created_at', $thang)->sum('tien_lai');
        $tien_kham_ht = $tien_kham_ht + $tien_lai_thuoc;
        $tien_kham_1 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 1)->sum('tien_kham');
        $tien_kham_2 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 2)->sum('tien_kham');
        $tien_kham_3 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 3)->sum('tien_kham');
        $tien_kham_4 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 4)->sum('tien_kham');
        $tien_kham_5 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 5)->sum('tien_kham');
        $tien_kham_6 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 6)->sum('tien_kham');
        $tien_kham_7 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 7)->sum('tien_kham');
        $tien_kham_8 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 8)->sum('tien_kham');
        $tien_kham_9 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 9)->sum('tien_kham');
        $tien_kham_10 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 10)->sum('tien_kham');
        $tien_kham_11 = DB::table('medical_bills')->whereMonth('schedule_date', $thang - 11)->sum('tien_kham');
        // echo $tien_kham_ht;
        $limit = $request->limit ? $request->limit : 100;
        $supplies = Supplies::latest();
        //$nhom_thuoc = DB::table('supplies')->select('nhom_thuoc')->groupBy('nhom_thuoc')->get();

        //Nếu hạn sử dụng thuốc gần hết hạn trước 7 ngày
        // if(isset($_GET["canh_bao"])){
        //     $dt = Carbon::now();
        //     $dt7 = $dt->addDays(7);
        //     $supplies = $supplies->whereDate('han_su_dung','<=', $dt7);
        // }else if($request->nhom_thuoc) {
        //     $supplies = $supplies->where('nhom_thuoc','like','%'.$request->nhom_thuoc.'%');
        // }

         //hiển thị tất cả
        // if(isset($_GET["tat_ca"])){
        //     $supplies = Supplies::latest();
        // }

        // $supplies = Supplies::get();
        // if($request->id) {
        //     $supplies = $supplies->where('id','like','%'.$request->id.'%');
        // }
        //tìm kiếm theo tên thuốc 
        if($request->ten_thuoc) {
            $supplies = $supplies->where('ten_thuoc','like','%'.$request->ten_thuoc.'%');
        }
        //sử lý tìm ra nhóm thuốc 
        $supplies = $supplies->paginate($limit); 
          
        return view('admin.statics', compact(
            'tien_kham_ht',
            'tien_kham_1',
            'tien_kham_2',
            'tien_kham_3',
            'tien_kham_5',
            'tien_kham_4',
            'tien_kham_6',
            'tien_kham_7',
            'tien_kham_8',
            'tien_kham_9',
            'tien_kham_10',
            'tien_kham_11',
            'supplies'

        ));
        // $limit = $request->limit ? $request->limit : 100;
        // $medical_bills = $this->medical_bills;
        // if($request->content) {
        //     $medical_bills = $medical_bills->where('first_name', 'like', '%' . $request->content . '%')
								// 			->orWhere('last_name', 'like', '%' . $request->content . '%')
								// 			->orWhere('patient_id', 'like', '%' . $request->content . '%')
								// 			->orWhere('accession_number', 'like', '%' . $request->content . '%');
        //     // $medical_bills = $medical_bills->withAccNo($request->content);
        //     // $medical_bills = $medical_bills->withPatientID($request->content);
        // }
        // if($request->date_from && $request->date_to) {
        //     $from = date("Y-m-d", strtotime($request->date_from));
        //     $to = date("Y-m-d", strtotime($request->date_to));
        //     $medical_bills = $medical_bills->whereBetween('schedule_date', array($from, $to));
        //     // dd($medi,cal_bills);
        // }
        // // dd($medical_bills);
        // $medical_bills = $medical_bills->latest();
        // $medical_bills = $medical_bills->paginate($limit);
        // $statuses = Status::all();
        // $levels = Level::all();

        // $arrMedical = array();
        // // Mảng medical có nhiều lịch sử
        // foreach ($medical_bills as $key => $medical_bill) {
        //     $arrMedical[$key] = array();
        //     foreach ($levels as $level) {
        //         // Mảng lịch sử
        //         if($medical_bill->histories) {
        //             dd(1);
        //             foreach ($medical_bill->histories as $history) {
        //                 if($history->user->level_id == $level->id){
        //                     $arrMedical[$key][$level->id] = $history->user;
        //                     $arrMedical[$key]["history"] = $history;
        //                 }
        //             }
        //         }
                
        //     }
        // }
        // dd($arrMedical);
        // return view('admin.statics',compact('medical_bills','statuses', 'levels', 'arrMedical'));

        
    }

    public function postRevertStatus(Request $request,$id) {
        // dd($request->all());
        $medical_bill = MedicalBill::findOrfail($request->id);
        $medical_bill->update(['study_status' => $request->study_status]);
        session(['success' => 'Chỉnh sửa thành công']);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
}

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalBill $medicalBill
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalBill $medicalBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalBill $medicalBill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partial = MedicalBill::findOrfail($id);
        // $partial -> update([
        //     'first_name' => 'gias tri moi'
        // ]);
        return view('users.editOder', compact('partial'));
    }
    public function post_edit(Request $request, $id)
    {
       $partial = MedicalBill::findOrfail($id);
       $partial->update([
            'first_name' => $request->first_name,
            'birth_date' =>  $request->birth_date,
            'sex'                  =>  $request->sex,
            'can_nang'             =>  $request->can_nang,
            'address'              =>  $request->address,

            //phần thân nhân
            'than_nhan'            =>  $request->than_nhan,
            'sdt_tn'               =>  $request->sdt_tn,
            'quan_he_tn'           =>  $request->quan_he_tn,
            'dia_chi_tn'           =>  $request->dia_chi_tn,
            
            'chieu_cao'            =>  $request->chieu_cao,
            'nhip_tim'             =>  $request->nhip_tim,
            'nhip_tho'             =>  $request->nhip_tho,
            'reason'               =>  $request->reason,
            'huyet_ap'             =>  $request->huyet_ap,
            'nhiet_do'             =>  $request->nhiet_do,
            'spO2'                 =>  $request->spO2,
       ]);
       return redirect()->route('get.exams.view');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\MedicalBill $medicalBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalBill $medicalBill)
    {
        //
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalBill $medicalBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalBill $medicalBill)
    {
        //
    }
}
