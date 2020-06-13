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
				<td style="text-align: center; font-size: 12px;">Mã chỉ định: <?php echo e($medical_bill->accession_number); ?> <br>Mã BN: <?php echo e($medical_bill->patient_id); ?></td>
			</tr>
		</table>
	</div>
	<div  style=" text-align: center; font-size: 16px;"><b>KẾT QUẢ THĂM KHÁM</b></div>

	
	<table border="0" width="100%" style="font-size: 12px;">
		<tr>
			<td>Họ và tên:&nbsp;&nbsp;<span ><b><?php echo e($medical_bill->first_name); ?></b></span> </td>
			<td>Ngày sinh:<span > <b><?php echo e($medical_bill->birth_date); ?></b></span></td>
			<td>Giới tính: <span ><b><?php echo e($medical_bill->sex); ?></b></span></td>
		</tr>
	</table>
	<table style="font-size: 12px;" border="0" width="100%">
		<tr>
			<td>Nhịp tim: <b><?php echo e($medical_bill->nhip_tim); ?></b></td>
			<td>Nhịp thở: <b><?php echo e($medical_bill->nhip_tho); ?></b> </span></td>
		</tr>
		<tr>
			<td>Huyết áp: <b><?php echo e($medical_bill->huyet_ap); ?></b> </span></td> 
			<td>Cân nặng: <b><?php echo e($medical_bill->can_nang); ?></b> </td>  
		</tr>
		<tr>
			<td>Chiều cao: <b><?php echo e($medical_bill->chieu_cao); ?></b> </td> 
			<td>Nhiệt độ: <b><?php echo e($medical_bill->nhiet_do); ?></b> </td>   	     
		</tr>
		<tr>
			<td>SpO2: <b><?php echo e($medical_bill->spO2); ?></b> </td>  
			<td>Triệu chứng: <b><?php echo e($medical_bill->reason); ?></b> </td>
		</tr>
		<tr>
			<td colspan="2">Kết Luận: <b><?php echo preg_replace( "/\r|\n/", "<br>", $medical_bill->ket_luan); ?></b></td>
		</tr> 
		<tr>
			<td colspan="2">Điều trị: <b><?php echo preg_replace( "/\r|\n/", "<br>", $medical_bill->dieu_tri); ?></b> </span></td>
		</tr> 
		<tr>
			<td colspan="2">Lời dặn: <b><?php echo preg_replace( "/\r|\n/", "<br>", $medical_bill->de_nghi); ?></b> </td> 
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
		<?php $__currentLoopData = $product_stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_stocks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr class="main" id="view-radiologist">
			<td style="padding-left: 10px;">
				<div><?php echo e($i++); ?></div>
			</td>
			<td>
				<div name="name"><?php echo e($product_stocks->name); ?></div>
			</td>
			<td>
				<div name="name"><?php echo e($product_stocks->qty); ?></div>
			</td>
			<td>
				<div name="name"><?php echo e($product_stocks->lieu_dung); ?></div>
			</td>				
		</tr>		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	</table>
	<table style="font-size: 12px;" border="0" width="100%">
		<tr>
			<td width="50%"></td>
			<td style="text-align: center;"> <?php echo e(date('h:i:s')); ?> ngày <?php echo e(date('d')); ?> tháng <?php echo e(date('m')); ?> năm <?php echo e(date('Y')); ?></td>
		</tr>
		<tr>
			<td></td>
			<td  style="text-align: center; ">BÁC SĨ PHÒNG KHÁM <br><br><br></td>
		</tr>

		<tr>
			<td></td>
			<td  style="text-align: center; ">BS. <?php echo e($medical_bill->radiologist_bacsidoc); ?></td>
		</tr>
	</table>

</body>
</html>