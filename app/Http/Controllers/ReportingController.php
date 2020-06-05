<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalBill;
use App\Template;
use App\History;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;
use File;
use Auth;

class ReportingController extends Controller
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
    // public function (){        
    //     if(isset($_POST['choose'])&&$_POST['choose']=="000000021")
    //         alert("đã nhận");
    //     else{
    //         alert("chưa nhận");     
         
    // }

    public function index(Request $request)
    {
        $medical_bills = MedicalBill::where('study_status', 3)->orderBy('id','desc');
        $limit = $request->limit ? $request->limit : 100;
        
        $templates = Template::all();
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;
        $today = date("Y-m-d");


        //show ngày hiện tại
        //  $dateFrom = $request->date_from;
        // $dateTo = $request->date_to;
        // $today = date("Y-m-d");
        // if (isset($dateFrom) || isset($dateTo)) 
        // {
        //     $medical_bills = MedicalBill::where('study_status', 3)->orderBy('id','desc');
        // }
        // else
        // {
        //     $medical_bills = MedicalBill::where('study_status', 3)->whereDate('schedule_date', $today)->orderBy('id','desc');
        // }

        // Nếu là ngày hôm nay
        // if(isset($_GET["today"])){
        //     $medical_bills = $medical_bills->whereDate('schedule_date', $today);
        // }else if(isset($_GET["last_day"])){ // Nếu là 7 ngày trc
        //     $dt = Carbon::now();
        //     $from = $dt->subDays(7);
        //     $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $from)
        //     ->whereDate('schedule_date', '<=', $today);
        // }else if(isset($request->date_from) && isset($request->date_to)){ // If có cả ngày từ và đến
        //     $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $dateFrom)
        //     ->whereDate('schedule_date', '<=', $dateTo);
        // }else{
        //     if(isset($request->date_from)){
        //         $medical_bills = $medical_bills->whereDate('schedule_date', '>=', $dateFrom);
        //     }
        //     if(isset($request->date_to)){
        //         $medical_bills = $medical_bills->whereDate('schedule_date', '<=', $dateTo);
        //     }
        // }
        
        if($request->patient_id) {
            $medical_bills = $medical_bills->where('patient_id','like','%'.$request->patient_id.'%');
        }
        if($request->patient_name) {
            // $name = $request->patient_name;
            // $medical_bills = $medical_bills->whereRaw("concat(first_name, ' ', last_name) LIKE ?", ['%' .$name. '%']);
            $medical_bills = $medical_bills->where('first_name','like','%'.$request->patient_name.'%');
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
        $medical_bills = $medical_bills->paginate($limit);

        $file = fopen($this->pathUrl, "r") or die("Unable to open file!");
        $url2 = fgets($file);
        fclose($file);
        return view('users.reporting', compact('medical_bills','templates', 'url2'));
    }
}
