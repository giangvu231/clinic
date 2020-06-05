<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id','medical_bill_id'
    ];

    function medicalbill(){
        return $this->belongsto(MedicalBill::class);
    }

    public function user(){
        return $this->belongsto(User::class);
    }
}
