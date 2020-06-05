<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class MedicalBill extends Model
{
    protected $fillable = [
        'patient_id',
        'first_name',
        'last_name',
        'birth_date',
        'can_nang',
        'chieu_cao',
        'nhip_tim',
        'nhip_tho',      
        'huyet_ap',
        'nhiet_do',
        'spO2',
        'sex',
        'accession_number',
        'schedule_date',       
        'ordering_doctor_id',
        'ordering_doctor_name',       
        'reason',       
        'visit_number',   
        'study_status', 
        'tong_tien',      
        'dieu_tri',
        'ket_luan',
        'de_nghi',
        'radiologist_bacsidoc',
        'radiologist_id',
        'is_edited',
        'than_nhan',
        'sdt_tn',
        'quan_he_tn',
        'dia_chi_tn',
        'khamlai',
        'cancel_time',
        'cancel_id',
        'cancel_name',
        'tien_kham',
    ];

    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->hasOne('App\Template','template_id','template_id');
    }

    public function isEdit()
    {
        // dd($this->radiologist_bacsidoc);
        return $this->study_status == null || $this->study_status == 3 || ($this->study_status < 4 && $this->radiologist_bacsidoc == Auth::user()->hoten && $this->radiologist_id == Auth::user()->chung_thu_so);
    }

    public function isFinalize()
    {
        return ($this->study_status == 3 && $this->radiologist_bacsidoc == Auth::user()->hoten && $this->radiologist_id == Auth::user()->chung_thu_so);
    }

    public function status(){
        return $this->belongsTo(Status::class, 'study_status');
    }

    public function histories(){
        return $this->beLongsTo(History::class);
    }

    public function product_stocks(){
        return $this->hasMany(ProductStock::class, 'accession_number', 'medical_bill_id');
    }
    // public function posts(){
    //     return $this->hasMany(posts::class, 'accession_number', 'medical_bill_id');
    // }


    function scopeWithName($query, $name)
    {
        // Split each Name by Spaces
        $fullname = $name;
        $names = explode(" ", $name);

        return MedicalBill::where(function($query) use ($names, $fullname) {
            foreach($names as $name) {
                $query->orWhere('first_name', 'like', '%' . $name . '%');
            }
            // $query->whereIn('first_name', $names);
            $query->orWhere(function($query) use ($names) {
                foreach($names as $name) {
                    $query->orWhere('last_name', 'like', '%' . $name . '%');
                }
            });
            $query->orWhere(function($query) use ($names, $fullname) {
                foreach($names as $name) {
                    $query->orWhere('accession_number', 'like', '%' . $fullname . '%');
                }
            });
            $query->orWhere(function($query) use ($names, $fullname) {
                foreach($names as $name) {
                    $query->orWhere('patient_id', 'like', '%' . $fullname . '%');
                }
            });
        });
    }

    function scopeWithAccNo($query, $accno) {
        return MedicalBill::where(function($query) use ($accno) {
            $query->orWhere('accession_number', 'like', '%' . $accno . '%');
        });
    }

    function scopeWithPatientID($query, $accno) {
        return MedicalBill::where(function($query) use ($accno) {
            $query->orWhere('patient_id', 'like', '%' . $accno . '%');
        });
    }
}
