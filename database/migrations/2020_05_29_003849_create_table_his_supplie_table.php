<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHisSupplieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('so_lo')->nullable();
            $table->string('gia_thanh')->nullable();
            $table->string('tien_lai')->nullable();
            $table->string('thanh_toan')->nullable();
            $table->string('so_luong_chi_tiet')->nullable();
            $table->string('ProductStocks_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
