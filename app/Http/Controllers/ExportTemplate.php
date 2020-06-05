<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\MedicalBill;
use GuzzleHttp\Client;
use DB;

class ExportTemplate extends Controller
{
	public function __construct()
	{
	}

	public function createUltrasound(Request $request)
	{
		$accession_number = $request->accession_number;
		$template = MedicalBill::where("accession_number",$accession_number)->first();
		if($template)
		{
			// echo $template->loai_thiet_bi;
			// if($template->loai_thiet_bi == 'CHỤP X - QUANG')
			if($template->loai_thiet_bi == 'DX')
			{
				$source = public_path().'/templates/TEMPLATEINXQUANG.docx';
			}
			else if($template->loai_thiet_bi == 'CT')
			{
				$source = public_path().'/templates/TEMPLATEINCT.docx';
			}
			else if($template->loai_thiet_bi == 'ES')
			{
				$source = public_path().'/templates/TEMPLATEINNOISOI.docx';
			}
			else if($template->loai_thiet_bi == 'US')
			{
				$source = public_path().'/templates/TEMPLATEINSIEUAM.docx';
			}
			else
			{
				$source = public_path().'/templates/TEMPLATEIN3.docx';
			}
			$mota = $template->mota;
			$mota = preg_replace("/<li>/is", "", $mota);
			$mota = preg_replace("/<\/li>/is", "\n", $mota);
			$mota = preg_replace("/<\/br>/is", "\n", $mota);
			$mota = preg_replace("/<br>/is", "\n", $mota);
			$mota = preg_replace("/<p>/is", "", $mota);
			$mota = preg_replace("/<\/p>/is", "\n", $mota);
			$mota = strip_tags($mota);
			$mota = explode("\n", $mota);
			$birth = preg_split("/-/is", $template->schedule_date);
			
			$data = [
				'id' => $template->id,
				'mabenhnhan' => $template->patient_id,
				'ten' => $template->first_name . ' ' . $template->last_name,
				'diachi' => $template->address,
				'ngaychidinh' => $birth[2] .'/' . $birth[1].'/' . $birth[0] . ' ' . $template->schedule_time,
				'phongkham' => $template->ordering_dept . ' ' . $template->exam_room,
				'bschidinh1' => $template->ordering_doctor_name,
				'bschidinh2' => $template->ordering_doctor_name,
				'chandoan' => $template->reason,
				'ghichu' => '',
				'thoigianchidinh' => $birth[2] .'/' . $birth[1].'/' . $birth[0] . ' ' . $template->schedule_time,
				'thoigianthuchien' => date("H"). ':' .date('i'). ' Ngày '.date('d') . ' tháng ' .date('m'). ' năm ' . date('Y'),
				'bsthuchien' => $template->radiologist_bacsidoc,
				'tuoi' => substr($template->birth_date, 0, 4),
				'gioitinh' => $template->sex,
				'ketluan' => $template->ket_luan,
				'tenkt' => $template->exam_name,
				'medical' => $template->ordering_doctor_name,
				'loaithietbi' => $template->loai_thiet_bi,
				'bhyt' => $template->ma_the,
				'ma_dkbd' => $template->ma_dkbd,
				'ma_cskcb' => $template->ma_cskcb
			];
	        // Create file docx
			$nameTemplate = templateProcessor($source, $data, $mota, $template->accession_number);
			$url  = 'templates/docx_report/'.$nameTemplate.'.docx';
			
			$path = "pdf/".$nameTemplate.".pdf";
	        // Create file pdf
	        // $cmd = "soffice --headless -convert-to pdf " . $url . " -outdir D:/PACS_Report/PDF";
	        // exec($cmd, $output);
			$cmd = "soffice --headless -convert-to pdf " . $url . " -outdir pdf";
			exec($cmd, $output);
			return view('view', compact('path'));
		} else {
			return "Not Found";
		}
	}
}
