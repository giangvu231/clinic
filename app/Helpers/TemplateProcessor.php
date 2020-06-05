<?php

use App\Status;

include 'rtf.php';

function getUserId(){
	return Auth::id();
}
function templateProcessor($source,$data,$mota,$id){
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
	$template = new \PhpOffice\PhpWord\TemplateProcessor($source);
    $template->cloneRow('mota', sizeof($mota));
    foreach ($mota as $key => $value) {
    	$template->setValue('mota#'.($key+1), $value);
	}
	$datetime = now();
	$datetime = str_replace(" ", "", $datetime);
	$datetime = str_replace("-", "", $datetime);
	$datetime = str_replace(":", "", $datetime);

	$name = $id . '_' . $datetime;
	$path2 = public_path() . '/templates/docx_report/'.$name.'.docx';
	foreach ($data as $key => $value) 
	{
		$template->setValue($key, $value);
	}
	$template->saveAs($path2);
    return $name;
}

function getUserStt($user){
	$statuses = Status::all();
    $sttArr = [];
    foreach ($statuses as $key => $stt) {
    	$status = $stt->toArray();
    	$status['is_checked'] = 0;
        foreach ($user->user_statuses as $user_status) {
            if($user_status->status_id == $stt->id)
                $status['is_checked'] = 1;
        }
        array_push($sttArr, $status);
    }
    return $sttArr;
}

function createXML($medical_bill){
	
	// $mota = $medical_bill->mota;
	// $mota = preg_replace("/<li>/is", "", $mota);
	// $mota = preg_replace("/<\/li>/is", "\n", $mota);
	// $mota = preg_replace("/<\/br>/is", "\n", $mota);
	// $mota = preg_replace("/<br>/is", "\n", $mota);
	// $mota = preg_replace("/<p>/is", "", $mota);
	// $mota = preg_replace("/<\/p>/is", "\n", $mota);
	// $mota = strip_tags($mota);
	
	// For Các bệnh viện

	$xml = new DOMDocument('1.0', 'utf-8');
	$xml->formatOutput = true;
	$DB_RIS = $xml->createElement("DB_RIS");
	$PID = $xml->createElement('PID', $medical_bill->patient_id);
	$HO_TEN = $xml->createElement('HO_TEN', $medical_bill->first_name);
	$GIOI_TINH = $xml->createElement('GIOI_TINH', $medical_bill->sex);
	$ns = $medical_bill->birth_date;
	$ns = str_replace(" ", "", $ns);
	$ns = str_replace("-", "", $ns);
	$NGAY_SINH = $xml->createElement('NGAY_SINH', $ns);
	$DIA_CHI = $xml->createElement('DIA_CHI', $medical_bill->address);
	$MA_HO_SO = $xml->createElement('MA_HO_SO', $medical_bill->order_number);
	$MA_DICH_VU = $xml->createElement('MA_DICH_VU', $medical_bill->exam_code);
	$TEN_DICH_VU = $xml->createElement('TEN_DICH_VU', $medical_bill->exam_name);
	$ncd = $medical_bill->schedule_date;
	$ncd = str_replace(" ", "", $ncd);
	$ncd = str_replace("-", "", $ncd);
	$ncd = str_replace(":", "", $ncd);
	$NGAY_CHI_DINH = $xml->createElement('NGAY_CHI_DINH',$ncd);
	$MA_KHOA_CHI_DINH = $xml->createElement('MA_KHOA_CHI_DINH', $medical_bill->ordering_dept);
	$REASON = $xml->createElement('REASON', $medical_bill->reason);
	$ORDER_STATUS = $xml->createElement('ORDER_STATUS', $medical_bill->order_status);
	$VISIT_NUMBER = $xml->createElement('VISIT_NUMBER', $medical_bill->visit_number);
	$EXAM_DEPT = $xml->createElement('EXAM_DEPT', $medical_bill->exam_dept);
	$EXAM_ROOM = $xml->createElement('EXAM_ROOM', $medical_bill->exam_room);
	$LOAI_THIET_BI = $xml->createElement('LOAI_THIET_BI', $medical_bill->loai_thiet_bi);
	$DE_NGHI = $xml->createElement('DE_NGHI', $medical_bill->de_nghi);
	$MA_THE = $xml->createElement('MA_THE', $medical_bill->ma_the);
	$MA_DKBD = $xml->createElement('MA_DKBD', $medical_bill->ma_dkbd);

	$gttt = $medical_bill->gt_the_tu;
	$gttt = str_replace(" ", "", $gttt);
	$gttt = str_replace("-", "", $gttt);
	$gttt = str_replace(":", "", $gttt);
	$GT_THE_TU = $xml->createElement('GT_THE_TU', $gttt);

	$gttd = $medical_bill->gt_the_den;
	$gttd = str_replace(" ", "", $gttd);
	$gttd = str_replace("-", "", $gttd);
	$gttd = str_replace(":", "", $gttd);
	$GT_THE_DEN = $xml->createElement('GT_THE_DEN', $gttd);

	$TEN_BENH = $xml->createElement('TEN_BENH', $medical_bill->reason);
	$MA_BENH = $xml->createElement('MA_BENH', $medical_bill->ma_benh);
	$MA_BENHKHAC = $xml->createElement('MA_BENHKHAC', $medical_bill->ma_benhkhac);
	$MA_CDCT = $xml->createElement('MA_CDCT', $medical_bill->ma_cdct);
	$NGAY_VAO = $xml->createElement('NGAY_VAO', $medical_bill->ngay_vao);
	$NGAY_RA = $xml->createElement('NGAY_RA', $medical_bill->ngay_ra);
	$MA_LOAI_KCB = $xml->createElement('MA_LOAI_KCB', $medical_bill->ma_loai_kcb);
	$MA_KHOA = $xml->createElement('MA_KHOA', $medical_bill->ordering_dept);
	$MA_CSKCB = $xml->createElement('MA_CSKCB', $medical_bill->ma_cskcb);
	$CAN_NANG = $xml->createElement('CAN_NANG', $medical_bill->can_nang);
	$DON_VI_TINH = $xml->createElement('DON_VI_TINH', $medical_bill->don_vi_tinh);
	$PHAM_VI = $xml->createElement('PHAM_VI', $medical_bill->pham_vi);
	$SO_LUONG = $xml->createElement('SO_LUONG', $medical_bill->so_luong);
	$MA_GIUONG = $xml->createElement('MA_GIUONG', $medical_bill->ma_giuong);
	$ACCESSION_NUMBER = $xml->createElement('ACCESSION_NUMBER', $medical_bill->accession_number);
	$MA_KHOA = $xml->createElement('MA_KHOA', $medical_bill->ordering_dept);
	$TEN_KHOA = $xml->createElement('TEN_KHOA', $medical_bill->ordering_dept);
	$MA_DICH_VU = $xml->createElement('MA_DICH_VU', $medical_bill->exam_code);
	$TEN_DICH_VU = $xml->createElement('TEN_DICH_VU', $medical_bill->exam_name);
	$KY_THUAT = $xml->createElement('KY_THUAT', $medical_bill->ky_thuat);
	$TEN_BS_CHI_DINH = $xml->createElement('TEN_BS_CHI_DINH', $medical_bill->ordering_doctor_name);
	$MA_BS_CHI_DINH = $xml->createElement('MA_BS_CHI_DINH', $medical_bill->ordering_doctor_id);
	$TEN_BS_KQ = $xml->createElement('TEN_BS_KQ', $medical_bill->radiologist_bacsidoc);
	$MA_BS_KQ = $xml->createElement('MA_BS_KQ', $medical_bill->radiologist_id);

	$MA_KTV1 = $xml->createElement('MA_KTV1', $medical_bill->ma_ktv1);
	$TEN_KTV1 = $xml->createElement('TEN_KTV1', $medical_bill->ten_ktv1);
	$MA_KTV2 = $xml->createElement('MA_KTV2', $medical_bill->ma_ktv2);
	$TEN_KTV2 = $xml->createElement('TEN_KTV2', $medical_bill->ten_ktv2);
	$TIEM_CAN_QUANG = $xml->createElement('TIEM_CAN_QUANG', $medical_bill->tiem_can_quang);
	$MA_LOAI_THUOC = $xml->createElement('MA_LOAI_THUOC', $medical_bill->ma_loai_thuoc);
	$TEN_LOAI_THUOC = $xml->createElement('TEN_LOAI_THUOC', $medical_bill->ten_loai_thuoc);
	$SO_LUONG_PHIM = $xml->createElement('SO_LUONG_PHIM', $medical_bill->so_luong_phim);
	$MA_LOAI_PHIM = $xml->createElement('MA_LOAI_PHIM', $medical_bill->ma_loai_phim);
	$TEN_LOAI_PHIM = $xml->createElement('TEN_LOAI_PHIM', $medical_bill->ten_loai_phim);
	$HINH_ANH = $xml->createElement('HINH_ANH', $medical_bill->hinh_anh);
	$MA_MAY = $xml->createElement('MA_MAY', $medical_bill->ma_may);

	$yl = $medical_bill->ngay_yl;
	$yl = str_replace(" ", "", $yl);
	$yl = str_replace("-", "", $yl);
	$yl = str_replace(":", "", $yl);
	$NGAY_YL = $xml->createElement('NGAY_YL',$yl);
	$LOAI_THIET_BI = $xml->createElement('LOAI_THIET_BI', $medical_bill->loai_thiet_bi);

	$mota1 = $medical_bill->mota;
	$mota1 = str_replace('&nbsp', " ", $mota1);
	$mota1 = str_replace("<p>", "", $mota1);
	$mota1 = str_replace("</p>", "<br/>", $mota1);
	$mota1 = str_replace("<br>", "<br/>", $mota1);
	$mota1 = str_replace("</span>", " ", $mota1);	
	$mota1 = str_replace('<span style="font-weight: 500;">', " ", $mota1);	
	$MO_TA = $xml->createElement('MO_TA', $mota1);

	$KET_LUAN = $xml->createElement('KET_LUAN', $medical_bill->ket_luan);
	$kq = $medical_bill->updated_at;
	$kq = str_replace(" ", "", $kq);
	$kq = str_replace("-", "", $kq);
	$kq = str_replace(":", "", $kq);
	$NGAY_KQ = $xml->createElement('NGAY_KQ', $kq);
	$TINH_TRANG = $xml->createElement('TINH_TRANG', $medical_bill->tinh_trang);
	$STUDY_STATUS = $xml->createElement('STUDY_STATUS', $medical_bill->study_status);
	$DB_RIS->appendChild($ACCESSION_NUMBER);
	$DB_RIS->appendChild($PID);
	$DB_RIS->appendChild($HO_TEN);
	$DB_RIS->appendChild($GIOI_TINH);
	$DB_RIS->appendChild($NGAY_SINH);
	$DB_RIS->appendChild($DIA_CHI);
	$DB_RIS->appendChild($MA_HO_SO);
	$DB_RIS->appendChild($MA_DICH_VU);
	$DB_RIS->appendChild($TEN_DICH_VU);
	$DB_RIS->appendChild($NGAY_CHI_DINH);
	$DB_RIS->appendChild($MA_KHOA_CHI_DINH);
	$DB_RIS->appendChild($REASON);
	$DB_RIS->appendChild($ORDER_STATUS);
	$DB_RIS->appendChild($VISIT_NUMBER);
	$DB_RIS->appendChild($EXAM_DEPT);
	$DB_RIS->appendChild($EXAM_ROOM);
	$DB_RIS->appendChild($LOAI_THIET_BI);	
	$DB_RIS->appendChild($TINH_TRANG);
	$DB_RIS->appendChild($STUDY_STATUS);
	$DB_RIS->appendChild($MA_THE); 
	$DB_RIS->appendChild($MA_DKBD);
	$DB_RIS->appendChild($GT_THE_TU);
	$DB_RIS->appendChild($GT_THE_DEN);
	$DB_RIS->appendChild($TEN_BENH);
	$DB_RIS->appendChild($MA_BENH);
	$DB_RIS->appendChild($MA_BENHKHAC);
	$DB_RIS->appendChild($MA_CDCT);
	$DB_RIS->appendChild($NGAY_VAO);
	$DB_RIS->appendChild($NGAY_RA);
	$DB_RIS->appendChild($MA_LOAI_KCB);
	$DB_RIS->appendChild($MA_KHOA);
	$DB_RIS->appendChild($MA_CSKCB);
	$DB_RIS->appendChild($CAN_NANG);
	$DB_RIS->appendChild($DON_VI_TINH);
	$DB_RIS->appendChild($PHAM_VI);
	$DB_RIS->appendChild($SO_LUONG);
	$DB_RIS->appendChild($MA_GIUONG);
	$DB_RIS->appendChild($MA_DICH_VU);
	$DB_RIS->appendChild($TEN_DICH_VU);
	$DB_RIS->appendChild($KY_THUAT);
	$DB_RIS->appendChild($TEN_BS_CHI_DINH);
	$DB_RIS->appendChild($MA_BS_CHI_DINH);
	$DB_RIS->appendChild($TEN_BS_KQ);
	$DB_RIS->appendChild($MA_BS_KQ);

	$DB_RIS->appendChild($MA_KTV1);
	$DB_RIS->appendChild($TEN_KTV1);
	$DB_RIS->appendChild($MA_KTV2);
	$DB_RIS->appendChild($TEN_KTV2);
	$DB_RIS->appendChild($TIEM_CAN_QUANG);
	$DB_RIS->appendChild($MA_LOAI_THUOC);
	$DB_RIS->appendChild($TEN_LOAI_THUOC);
	$DB_RIS->appendChild($SO_LUONG_PHIM);
	$DB_RIS->appendChild($MA_LOAI_PHIM);
	$DB_RIS->appendChild($TEN_LOAI_PHIM);
	$DB_RIS->appendChild($HINH_ANH);
	$DB_RIS->appendChild($MA_MAY);


	$DB_RIS->appendChild($NGAY_YL);
	$DB_RIS->appendChild($LOAI_THIET_BI);
	$DB_RIS->appendChild($MO_TA);
	$DB_RIS->appendChild($KET_LUAN);
	$DB_RIS->appendChild($DE_NGHI);
	$DB_RIS->appendChild($NGAY_KQ);	
	$xml->appendChild($DB_RIS);
	$datetime = now();
	$datetime = str_replace(" ", "", $datetime);
	$datetime = str_replace("-", "", $datetime);
	$datetime = str_replace(":", "", $datetime);
	$name = $medical_bill->accession_number . '_' . $datetime;
	$xml->save(config('app.driver_share') .$name. ".xml");
}

function rtfToHtml($strRtf) {
	$reader = new RtfReader();
	$rtf = $strRtf; // or use a string
	$result = $reader->Parse($rtf); // $result = 1 -> success
	if($result){
		$formatter = new RtfHtml('UTF-8');
		return $formatter->Format($reader->root);
	}
	return -1;
}