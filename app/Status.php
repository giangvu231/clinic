<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function medical_bills()
    {
        return $this->hasMany('App\MedicalBill', 'study_status');
    }

    public function user_status()
    {
        return $this->hasOne(UserStatus::class);
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
