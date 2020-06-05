<?php
   
namespace App;

   
use Illuminate\Database\Eloquent\Model;
   
class ProductStock extends Model
{
   
    public $table = "product_stocks";
    
    public $fillable = [
    	'name',
        'so_lo',
    	'qty',
    	'lieu_dung',
        'don_vi',
    	'supplies_id',
    	'medical_bill_id',   
        'posts_id'     
    ];
    public function posts(){
        return $this->hasMany(posts::class, 'posts_id', 'ProductStocks_id');
    }
}
