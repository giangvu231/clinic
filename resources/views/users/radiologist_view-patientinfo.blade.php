@extends('layouts.view')
@section('title','Bác sĩ chẩn đoán')
@section('css')
<style type="text/css">
	.main-btn
	{
		color: #fff;
		background-color: #00BD9C;
		font-weight: 500;
	}
	.main-btn:hover
	{
		color: #fff;
	}
	.edit-template2
	{
		background-color: #fff;
		padding: 0;
	}
	body
	{
		background-color: #f5f5f5;
		font-size: 14px;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	}
	.edit-template2 .topbar 
	{
		padding: 0px;
		border-bottom: 0px solid #dddddd;
	}
	.detail
	{
		margin-top: 30px;
	}
	table tr td
	{
		font-weight: 500;
	}
	table tr td span
	{
		font-weight: 700;
	}
</style>
@endsection
@section('content-view')
<div class="container-fluid">
	<div class="row">	
		<?php 
			$link = str_replace('patientinfo-page', "pdfexport/", URL::current());
		?>
		<iframe src="{{ $link }}{{ $medical_bill->id }}" width="100%" height="800px"></iframe>
		<!-- <table border="0" cellpadding="10" width="100%" style="line-height: 50px;">
			<tr>
				<th colspan="4" style="text-align: center; font-size: 20px;">Thông tin bệnh nhân</th>
			</tr>
			<tr>
				<td colspan="4">Mã CSKCB: <span>{{ $medical_bill->accession_number }}</span></td>      
			</tr>
			<tr>
				<td colspan="4">Mã bệnh nhân: <span>{{ $medical_bill->patient_id }}</span></td>
			</tr>
			<tr>
				<td colspan="4">Mã hồ sơ: <span>{{ $medical_bill->order_number }}</span></td>
			</tr>
			<tr>
				<td width="50%" colspan="2">Tên bệnh nhân: <span>{{ $medical_bill->first_name }}</span></td>
				<td width="50%" colspan="2">Giới tính: <span>{{ $medical_bill->sex }}</span></td>
			</tr>
			<tr>
				<td colspan="2">Ngày sinh: <span>{{ $medical_bill->birth_date }}</span></td>
				<td colspan="2">Cân nặng: <span>{{ $medical_bill->can_nang }}</span></td>
			</tr>
			<tr>
				<td colspan="4">Địa chỉ: <span>{{ $medical_bill->address }}</span></td>
			</tr>
			<tr>
				<td colspan="2">Mã thẻ bảo hiểm y tế: <span>{{ $medical_bill->ma_the }}</span></td>
				<td colspan="2">Nơi đăng ký ban đầu: <span>{{ $medical_bill->ma_dkbd }}</span></td>
			</tr>
			<tr>
				<td colspan="4">Giá trị thẻ: 
					<span>{{ substr($medical_bill->gt_the_tu,6,2) }}/{{ substr($medical_bill->gt_the_tu,4,2) }}/{{ substr($medical_bill->gt_the_tu,0,4) }} - {{ substr($medical_bill->gt_the_den,6,2) }}/{{ substr($medical_bill->gt_the_den,4,2) }}/{{ substr($medical_bill->gt_the_den,0,4) }}</span>
				</td>
			</tr>
			<tr>
				<td colspan="3">Tên bệnh: <span>{{ $medical_bill->reason }}</span></td>
				<td>Mã bệnh: <span>{{ $medical_bill->ma_benh }}</span></td>
			</tr>
			<tr>
				<td width="25%">Mã khoa: <span>{{ $medical_bill->ordering_dept }}</span></td>
				<td width="25%">Mã giường: <span>{{ $medical_bill->ma_giuong }}</span></td>
				<td colspan="2">Mã bệnh viên: <span>{{ $medical_bill->ma_cskcb }}</span></td>
			</tr>
			<tr>
				<td width="25%" colspan="2">Mã dịch vụ: <span>{{ $medical_bill->exam_code }}</span></td>
				<td width="25%" colspan="2">Mã PTTT: <span>{{ $medical_bill->loai_thiet_bi }}</span></td>  
			</tr>
			<tr>
				<td colspan="4">Tên dịch vụ: <span>{{ $medical_bill->exam_name }}</span></td> 
			</tr>
			<tr>
				<td colspan="2">Số lượng: <span>{{ $medical_bill->so_luong }}</span></td>
				<td colspan="2">Phạm vi: <span>{{ $medical_bill->pham_vi }}</span></td>
			</tr>
			<tr>
				<td colspan="2">Mã bác sĩ chỉ định: <span>{{ $medical_bill->ordering_doctor_id }}</span></td>
				<td colspan="2">Tên bác sĩ chỉ định: <span>{{ $medical_bill->ordering_doctor_name }}</span></td>
			</tr>
			<tr>
				<td colspan="2">Mã bác sĩ kết quả: <span>{{ $medical_bill->radiologist_id }}</span></td>
				<td colspan="2">Tên bác sĩ kết quả: <span>{{ $medical_bill->radiologist_bacsidoc }}</span></td>
			</tr>
			<tr>
				<td colspan="2">Ngày chỉ định: <span>{{ $medical_bill->schedule_date }}</span></td>
				<td colspan="2">Ngày kết quả: <span>{{ $medical_bill->ngay_kq }}</span></td>
			</tr>
		</table> -->
	</div>
</div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
</script>
@endsection

