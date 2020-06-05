<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoten');
			$table->string('userid')->unique();
            $table->string('dien_thoai')->nullable();
            $table->string('di_dong')->nullable();
			$table->integer('status');
            $table->string('chung_thu_so');
            $table->string('password');
			$table->integer('level_id')->unsigned(); // Quyền hạn của bác sĩ
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
