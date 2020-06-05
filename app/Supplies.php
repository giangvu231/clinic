<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Supplies extends Model
{
    public $table = "supplies";
    
    public $fillable = [
        'trang_thai',
    	'ten_thuoc',
        'so_lo',
    	'ma_thuoc',
    	'so_luong',
        'con_lai',
        'nha_cung_cap',
    	'SL_goi_y',
    	'lieu_dung',
    	'gia_ban',
    	'gia_nhap',
    	'ngay_nhap',
    	'han_su_dung',
    	'don_vi',
    	'nhom_thuoc'
  	];

    public function product_stocks(){
        return $this->hasMany(ProductStock::class, 'ma_thuoc', 'supplies_id');
    }
    // public function posts(){
    //     return $this->hasMany(posts::class, 'ma_thuoc', 'supplies_id');
    // }
    
    public $timestamps = true;
}
