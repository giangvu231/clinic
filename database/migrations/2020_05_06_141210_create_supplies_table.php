<?php
   
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
   
class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trang_thai')->nullable();
            $table->string('ma_thuoc')->nullable();
            $table->string('so_lo')->nullable();
            $table->string('ten_thuoc')->nullable();
            $table->string('nha_cung_cap')->nullable();
            $table->string('so_luong')->nullable();
            $table->string('con_lai')->nullable();
            $table->string('SL_goi_y')->nullable();
            $table->string('lieu_dung')->nullable();
            $table->string('gia_ban')->nullable();
            $table->string('gia_nhap')->nullable();
            $table->date('ngay_nhap')->nullable();
            $table->date('han_su_dung')->nullable();
            $table->string('don_vi')->nullable();
            $table->string('nhom_thuoc')->nullable();            
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}