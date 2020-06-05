<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
             $table->string('address')->nullable();
            $table->string('sex')->nullable();  
            $table->string('can_nang')->nullable();// mã hồ sơ
            $table->string('accession_number')->nullable()->unique();
            $table->string('chieu_cao')->nullable(); 
            $table->string('nhiet_do')->nullable(); //mã dịch vụ
            $table->string('nhip_tim')->nullable(); // tên dịch vụ
            $table->dateTime('schedule_date')->nullable(); // ngày chỉ định
            $table->dateTime('schedule_time')->nullable();// giờ chỉ định
            $table->string('ordering_doctor_id')->nullable();// mã bác sĩ chỉ định
            $table->string('ordering_doctor_name')->nullable();// tên bác sĩ chỉ định
            $table->string('nhip_tho')->nullable();
            $table->string('reason')->nullable();// lý do nhập viện
            $table->string('spO2')->nullable();
            $table->string('visit_number')->nullable();
            $table->string('huyet_ap')->nullable();
            $table->string('tien_kham')->nullable();
            

            //phần dữ liệu người nhà
            $table->string('than_nhan')->nullable();
            $table->string('sdt_tn')->nullable();
            $table->string('quan_he_tn')->nullable();
            $table->string('dia_chi_tn')->nullable();
           
            $table->integer('study_status')->default(3);
            // $table->foreign('study_status')->references('id')->on('statuses')->onDelete('cascade');

            $table->string('dieu_tri')->nullable();
            $table->string('ket_luan')->nullable();
            $table->string('de_nghi')->nullable();
            $table->string('tong_tien')->nullable();

            $table->string('radiologist_bacsidoc')->nullable();//mã bác sĩ kết luận
            $table->string('radiologist_id')->nullable();
            $table->integer('history_id')->nullable();
            $table->integer('is_edited')->default(0);


          
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
        Schema::dropIfExists('medical_bills');
    }
}
