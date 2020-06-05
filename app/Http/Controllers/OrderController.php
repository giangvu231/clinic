<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Template;
use App\History;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use Storage;
use File;
use App\MedicalBill;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $i = DB::table('medical_bills')->get();       
        $subInt = count($i);
        $subInt += 1;
        if($subInt > 0 && $subInt < 10)
        {
            $pid = 'BN'.'0000000'.$subInt;
        }
        else if($subInt >= 10 && $subInt < 100)
        {
            $pid = 'BN'.'000000'.$subInt;
        }
        else if($subInt >= 100 && $subInt < 1000)
        {
            $pid = 'BN'.'00000'.$subInt;
        } 
        else if($subInt >= 1000 && $subInt < 10000)
        {
            $pid = 'BN'.'0000'.$subInt;
        }
        else if($subInt >= 10000 && $subInt < 100000)
        {
            $pid = 'BN'.'000'.$subInt;
        }
        else if($subInt >= 100000 && $subInt < 1000000)
        {
            $pid = 'BN'.'00'.$subInt;
        }
        else if($subInt >= 1000000 && $subInt < 10000000)
        {
            $pid = 'BN'.'0'.$subInt;
        }
        else if($subInt >= 10000000 && $subInt < 100000000)
        {
            $pid = 'BN'.$subInt;
        }

        //acc
        $acc = 1;
        $acc = $pid.$acc;
        $acc = substr($acc, 2);     
        $visit_number        = '1';
               
       //thông tin bn               
        $first_name           = $request->input('first_name');
        $birth_date           = $request->input('birth_date');
        $sex                  = $request->input('sex');
        $can_nang             = $request->input('can_nang');        
        $address              = $request->input('address'); 
        $chieu_cao            = $request->input('chieu_cao'); 
        $nhip_tim             = $request->input('nhip_tim');        
        $nhip_tho              = $request->input('nhip_tho'); 
        $huyet_ap              = $request->input('huyet_ap');
        $nhiet_do              = $request->input('huyet_ap');
        $spO2              = $request->input('spO2');       
        $reason               = $request->input('reason');

//thân nhân
        $than_nhan              = $request->input('than_nhan'); 
        $sdt_tn              = $request->input('sdt_tn'); 
        $quan_he_tn              = $request->input('quan_he_tn'); 
        $dia_chi_tn              = $request->input('dia_chi_tn'); 
        $tien_kham              = 200000;

        $schedule_date             = $request->input('schedule_date');        
        
        $ordering_doctor_name       = $request->input('radiologist_id');
        $ordering_doctor_id = $request->input('radiologist_bacsidoc');  
       
        $radiologist_id       = $request->input('radiologist_id');
        $radiologist_bacsidoc = $request->input('radiologist_bacsidoc');
        
        $data = array(
            'accession_number'     => $acc,
            'patient_id'           => $pid,        

            'first_name'           => $first_name,
            'birth_date'           => str_replace("-","", $birth_date),
            'sex'                  => $sex,
            'can_nang'             => $can_nang,
            'address'              => $address,

            //phần thân nhân
            'than_nhan'              => $than_nhan,
            'sdt_tn'              => $sdt_tn,
            'quan_he_tn'              => $quan_he_tn,
            'dia_chi_tn'              => $dia_chi_tn,
            
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
             'schedule_date' => date('Y-m-d H:i:s'),

            // 'schedule_date'        => $schedule_date,
            'visit_number'              => $visit_number,
           
            
           
            'study_status' => '3', 
            'created_at' => date('Y-m-d H:i:s'), 
            'ordering_doctor_name' => $user->hoten, 
            'ordering_doctor_id' => $user->chung_thu_so
        );

        DB::table("medical_bills")->insert($data);
        return back();
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
    public function edit()
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
