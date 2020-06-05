<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'TuDienKetQua_Id',              
        'TenNoiDung',
        'KetQua',
        'KetQua_Text',
        'KetLuan',
        // 'status'
    ];
	
	protected $primaryKey = 'TuDienKetQua_Id';

    public function medical_bills()
    {
        return $this->hasMany('App\MedicalBill', 'template_id');
    }
}
