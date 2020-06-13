<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<style>
	body 
	{ 
		font-family: DejaVu Sans, sans-serif; 
	}
</style>
<body>
	<?php  ?>
	<div>
		<table border="0" width="100%">
			<tr>
				<td width="50%" style="text-align: center;">SỞ Y TẾ QUẢNG NINH</td>
				<td width="50%" style="text-align: right;">Mã BN: 182216435</td>
			</tr>
			<tr>
				<td style="text-align: center;">BỆNH VIỆN ĐA KHOA TỈNH BÃI CHÁY</td>
				<td></td>
			</tr>
		</table>
	</div>

	<br>

	<div style="font-weight: bold; text-align: center; font-size: 20px;">PHIẾU KẾT QUẢ</div>
	<div style="font-weight: 400; text-align: center; font-size: 20px;">CHUẨN ĐOÁN HÌNH ẢNH</div>
	
	<br>

	<table border="0" width="100%">
		<tr>
			<td>Họ và tên: <?php echo e($medical_bill->first_name); ?></td>
			<td>Năm sinh: <?php echo e($medical_bill->birth_date); ?></td>
			<td>Giới tính: <?php echo e($medical_bill->sex); ?></td>
		</tr>
		<tr>
			<td colspan="3">Địa chỉ: <?php echo e($medical_bill->address); ?></td>
		</tr>
		<tr>
			<td>Khoa phòng: <?php echo e($medical_bill->khoa); ?></td>
			<td colspan="2">Bác sĩ chỉ định: <?php echo e($medical_bill->ordering_doctor_name); ?></td>
		</tr>
		<tr>
			<td colspan="3">Ngày chỉ định: <?php echo e($medical_bill->ncd); ?></td>
		</tr>
		<tr>
			<td colspan="3">Chẩn đoán: <?php echo e($medical_bill->cd); ?></td>
		</tr>
		<tr>
			<td colspan="3">Ghi chú: <?php echo e($medical_bill->ghichu); ?></td>
		</tr>
	</table>

	<br>

	<table border="0" width="100%">
		<tr>
			<td width="15%" style="font-weight: bold;">Tên KT:</td>
			<td><?php echo e($medical_bill->tenkt); ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Mô tả: </td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $medical_bill->mota; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Kết luận: </td>
			<td><?php echo e($medical_bill->ketluan); ?></td>
		</tr>
	</table>

	<br>

	<table border="0" width="100%">
		<tr>
			<td width="50%"></td>
			<td style="text-align: center;">Quảng Ninh, ngày a tháng b năm c</td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align: center; font-weight: bold;">
				Bác sĩ chỉ định
			</td>
		</tr>
	</table>

</body>
</html>