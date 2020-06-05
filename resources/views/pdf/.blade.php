<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/times.ttf');
		font-style: normal; 
	}
	@font-face{
		font-family: "Times New Roman" !important; 
		src: url('fonts/timesbd.ttf');
		font-weight: bold; 
	}
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/timesi.ttf');
		font-style: italic; 
	}
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/timesbi.ttf');
		font-style: italic; 
		font-weight: bold;
	}
	* {
		font-family: Times New Roman !important;
	}
	.font-bold {
		font-weight: bold;
	}
	.font-italic {
		font-style: italic; 
	}
</style>
<body style="margin-top: -30px;">
	<?php  ?>
	<div>
		<table border="0" width="100%">
			<tr>
				<td style="text-align: center; font-size: 14px; ">SỞ Y TẾ HÀ NỘI <br><b>Phòng khám chuyên khoa Nhi BS MAI</b></td>
				<td></td>
				<td style="text-align: center; font-size: 12px;">Mã chỉ định: {{ $medical_bill->accession_number }} <br>Mã BN: {{ $medical_bill->patient_id }}</td>
			</tr>
		</table>
	</div>
	<div  style=" text-align: center; font-size: 16px;"><b>KẾT QUẢ THĂM KHÁM</b></div>

	
	<table border="0" width="100%" style="font-size: 12px;">
		<tr>
			<td>Họ và tên:&nbsp;&nbsp;<span ><b>{{ $medical_bill->first_name }}</b></span> </td>
			<td>Ngày sinh:<span > <b>{{ $medical_bill->birth_date }}</b></span></td>
			<td>Giới tính: <span ><b>{{ $medical_bill->sex }}</b></span></td>
		</tr>
	</table>
	<table style="font-size: 12px;" border="0" width="100%">
		<tr>
			<td>Nhịp tim: <b>{{ $medical_bill->nhip_tim }}</b></td>
			<td>Nhịp thở: <b>{{ $medical_bill->nhip_tho }}</b> </span></td>
		</tr>
		<tr>
			<td>Huyết áp: <b>{{ $medical_bill->huyet_ap }}</b> </span></td> 
			<td>Cân nặng: <b>{{ $medical_bill->can_nang }}</b> </td>  
		</tr>
		<tr>
			<td>Chiều cao: <b>{{ $medical_bill->chieu_cao }}</b> </td> 
			<td>Nhiệt độ: <b>{{ $medical_bill->nhiet_do }}</b> </td>   	     
		</tr>
		<tr>
			<td>SpO2: <b>{{ $medical_bill->spO2 }}</b> </td>  
			<td>Triệu chứng: <b>{{ $medical_bill->reason }}</b> </td>
		</tr>
		<tr>
			<td colspan="2">Kết Luận: <b>{!! preg_replace( "/\r|\n/", "<br>", $medical_bill->ket_luan) !!}</b></td>
		</tr> 
		<tr>
			<td colspan="2">Điều trị: <b>{!! preg_replace( "/\r|\n/", "<br>", $medical_bill->dieu_tri) !!}</b> </span></td>
		</tr> 
		<tr>
			<td colspan="2">Lời dặn: <b>{!! preg_replace( "/\r|\n/", "<br>", $medical_bill->de_nghi) !!}</b> </td> 
		</tr>       
	</table>
	<table border="1" style="text-align: center; font-size: 12px" width="100%">		
		<tr>
			<th width="10%">STT</th>
			<th width="20%">Tên thuốc</th>
			<th width="20%">Số lượng</th>
			<th width="30%">Liều dùng</th>
		</tr>	
		<?php $i = 1 ?>
		@foreach ($product_stocks as $key => $product_stocks)
		<tr class="main" id="view-radiologist">
			<td style="padding-left: 10px;">
				<div>{{ $i++ }}</div>
			</td>
			<td>
				<div name="name">{{ $product_stocks->name }}</div>
			</td>
			<td>
				<div name="name">{{ $product_stocks->qty }}</div>
			</td>
			<td>
				<div name="name">{{ $product_stocks->lieu_dung }}</div>
			</td>				
		</tr>		
		@endforeach 
	</table>
	<table style="font-size: 12px;" border="0" width="100%">
		<tr>
			<td width="50%"></td>
			<td style="text-align: center;"> {{ date('h:i:s') }} ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</td>
		</tr>
		<tr>
			<td></td>
			<td  style="text-align: center; ">BÁC SĨ PHÒNG KHÁM <br><br><br></td>
		</tr>

		<tr>
			<td></td>
			<td  style="text-align: center; ">BS. {{ $medical_bill->radiologist_bacsidoc }}</td>
		</tr>
	</table>

</body>
</html>