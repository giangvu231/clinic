<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('TuDienKetQua_Id');
            $table->string('MaSo')->nullable();
            $table->integer('NhomTuDien_Id')->nullable();
            $table->integer('DichVu_Id')->nullable();
            $table->string('TenNoiDung')->nullable();
            $table->longText('KetQua')->nullable();
            $table->longText('KetQua_Text')->nullable();
            $table->longText('KetLuan')->nullable();
            $table->integer('User_Id')->nullable();
            $table->string('Language_Id')->nullable();
            $table->integer('SuDungChung')->nullable();
            $table->integer('TamNgung')->nullable();
            $table->longText('Attribute1')->nullable();
            $table->longText('Attribute2')->nullable();
            $table->longText('Attribute3')->nullable();
            $table->longText('Attribute4')->nullable();
            $table->integer('NguoiTao_Id')->nullable();
            $table->integer('NguoiCapNhat_Id')->nullable();
            $table->integer('NhomDichVu_Id')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('templates');
    }
}