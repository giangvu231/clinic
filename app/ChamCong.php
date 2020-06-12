<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamCong extends Model
{
    public $table = "chamcong";
    
    public $fillable = [
        'ten_nv',
        'ma_nv',
    	'ngay_cham',
    	'so_cong'
    ];
}
