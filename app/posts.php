<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    public $table = "posts";
    
    public $fillable = [
        'so_lo',
    	'so_luong_chi_tiet',
    	'supplies_id',
    	'gia_thanh',
    	'tien_lai',
        'thanh_toan',
    	'medical_bill_id'
    	// 'ProductStocks_id'
    ];
}
