<?php
   
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
   
class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('qty')->nullable();//số lượng tổng uống theo đơn
            $table->string('so_lo')->nullable();
            $table->string('don_vi')->nullable();
            $table->string('lieu_dung')->nullable();
            $table->string('medical_bill_id')->nullable();
            $table->string('supplies_id')->nullable();
            $table->string('posts_id')->nullable();
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
        Schema::dropIfExists('product_stocks');
    }
}