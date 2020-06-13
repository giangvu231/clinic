<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChamCongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChamCong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nv')->nullable();
            $table->string('ma_nv')->nullable();
            $table->date('ngay_cham')->nullable();
            $table->string('so_cong')->nullable();
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
        Schema::dropIfExists('ChamCong');
    }
}
