<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Order extends Model
{
	protected $fillable = [
		'patient_id',
		'first_name',
		'last_name',
		'birth_date',
		'sex',
		
		'accession_number',
		'can_nang',
		'address',
		'schedule_date',
		'chieu_cao',
		'nhip_tim',
		'nhip_tho',
		'reason',
		'huyet_ap',
		'nhiet_do',
		'visit_number',
		'spO2',		
		'study_status',
		'mota',
		'ket_luan',
		'de_nghi',
		'ordering_doctor_name',
		'ordering_doctor_id'
		'radiologist_bacsidoc',
		'radiologist_id',
		'is_edited'
	];

	public $timestamps = true;
}
