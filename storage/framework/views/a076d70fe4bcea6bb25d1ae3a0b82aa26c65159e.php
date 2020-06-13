<?php $__env->startSection('title','Bác sĩ chuẩn đoán'); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
	body
	{
		font-size: 14px;
		background-color: #f5f5f5;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	}
	.menu-wrapper
	{
		
		margin-bottom: 30px;
	}
	.menu
	{
		line-height: 56px;
		
		color: #fff;
		text-transform: uppercase;
		font-weight: 500;
	}
	.logo a
	{
		color: #fff;
		text-decoration: none;
	}
	.nav-links
	{
		margin: 0px;
		list-style: none;
		padding: 0px;	
	}
	.nav-links li
	{
		display: inline-block;
		padding-left: 10px;
		padding-right: 10px;
	}
	.nav-links li a
	{
		color: #fff;
		text-decoration: none;
	}
	.nav-links li:hover
	{
		background-color: blue;
	}
	.welcome
	{
		text-align: right;
		text-transform: none;
	}
	.welcome a
	{
		color: #fff;
		text-decoration: none;
	}
	table tr th
	{
		text-align: center;
	}
	table tr
	{
		line-height: 40px;
		font-weight: 400;
	}
	input.button-submit, input.button-reset
	{
		width: 100%;
		line-height: 40px;
		border-radius: 5px;
		
		color: #fff;
		font-weight: bold;
		text-transform: uppercase;
		border: 1px solid #00BD9C;
	}
	input.button-reset
	{
		background-color: #2f4358;
		border: 1px solid #2f4358;
	}
	button
	{
		width: 90%;
		border-radius: 5px;
		background-color: #00BD9c;
		border: none;
		text-align: center;
		color: #fff;
	}
	.top 
	{
		padding: 8px 12px;
		background: #00BD9c;
		color: #ffffff;
		position: fixed;
		bottom: 40px;
		right: 10px;
		cursor: pointer;
		display: none;
		z-index: 999;
		border-radius: 20px;
	}
	span.important-infor
	{
		color: red;
	}
	table tr td table tr td input, select
	{
		width: 90% !important;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div style="text-align: center; margin-bottom: 10px; font-size: 30px; font-weight: bold;">Tiếp nhận người khám</div>
		<form style="width: 100%" action="<?php echo e(route('post.order.store')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

			<table width="100%" border="0">
				<tr>
					<td  colspan="2" width="50%" style="vertical-align: top;">
						<table border="0" width="100%" style="text-align: center;">
							
							<tr>
								<td style="font-weight: bold;">Họ và tên <span class="important-infor">*</span></td>
								<td><input type="text" name="first_name" class="form-control" autocomplete="off" placeholder="" required=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Ngày sinh <span class="important-infor">*</span></td>
								<td><input type="date" name="birth_date" class="form-control" autocomplete="off" placeholder="" required=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Giới tính </td>
								<td>
									<select class="form-control" name="sex">
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Địa chỉ </td>
								<td><input type="text" name="address" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Tên người thân</td>
								<td><input type="text" name="than_nhan" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Sđt người thân </td>
								<td><input type="text" name="sdt_tn" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Mối quan hệ </td>
								<td><input type="text" name="quan_he_tn" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Địa chỉ người thân </td>
								<td><input type="text" name="dia_chi_tn" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							
						</table>
					</td>
					<td colspan="2" width="50%" style="vertical-align: top;">
						<table style="text-align: center;" border="0" width="100%">
							<tr>
								<td style="font-weight: bold;">Nhịp tim</td>
								<td><input type="number" name="nhip_tim" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Nhịp thở</span></td>
								<td><input type="number" name="nhip_tho" class="form-control" autocomplete="off" placeholder="" ></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Huyết áp</span></td>
								<td><input type="number" name="huyet_ap" class="form-control" autocomplete="off" placeholder="" ></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Cân nặng </td>
								<td><input type="number" name="can_nang" class="form-control" autocomplete="off" placeholder="VD: 60 ( đơn vị tính theo kg )"></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Chiều cao </td>
								<td><input type="number" name="chieu_cao" class="form-control" autocomplete="off" placeholder="đơn vị cm"></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Nhiệt độ</td>
								<td><input type="number" name="nhiet_do" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">SpO2</td>
								<td><input type="number" name="SpO2" class="form-control" autocomplete="off" placeholder=""></td>
							</tr>
							
							<tr>
								<td style="font-weight: bold;">Triệu chứng<span class="important-infor">*</span></td>
								<td><input type="text" name="reason" class="form-control" autocomplete="off" placeholder="" required=""></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Ngày tiếp nhận <span class="important-infor">*</span></td>
								<td><input type="date" name="ngay_vao" class="form-control" autocomplete="off" placeholder="" required="" value="<?php echo date('Y-m-d'); ?>"></td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr>
					<td width="25%"></td>
					<td style="text-align: center; padding-top: 10px;">
						<input type="submit" name="" value="Nhập" class="button-submit btn-primary">
					</td>
					<td style="text-align: center; padding-top: 10px;">
						<input type="reset" name="" value="Xóa" class="button-reset">
					</td> 
					<td width="25%"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div class="top" style="display: none;"><i class="fas fa-arrow-up"></i></div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) 
			{
				$(".top").fadeIn();
			}
			else 
			{
				$(".top").fadeOut();
			}
		});
		$(".top").click(function () {
			$("body,html").animate({scrollTop: 0}, "slow");
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>