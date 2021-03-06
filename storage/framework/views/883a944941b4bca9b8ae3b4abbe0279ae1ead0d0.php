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
	input.button-submit, input.button-reset
	{
		width: 300px;
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
		line-height: 38px;
	}
	tr.header
	{
		background-color: #d2dae3;
		height: 50px;
		color: rgba(38,54,72);
	}
	tr.header div
	{
		font-weight: 500 !important;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	}
	tr.main
	{
		background-color: #fff;
		color: #2f4358;
		height: 40px;
		border-bottom: 1px solid #d2dae3;
	}
	tr.main div
	{
		font-weight: 400;
	}
	tr.main:hover
	{
		background-color: #e3e3e3;
	}
	.fa-notes-medical:hover
	{
		color: #00BD9C;
	}
	.fa-arrow-alt-circle-right:hover
	{
		color: #00BD9C;
	}
	th
	{
		padding: 5px;
	}
	td
	{
		display: table-cell;
	}
	.t_head
	{
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.navtabs
	{
		margin-top: 30px;
	}
	.navtabs a
	{
		color: #000;
		text-transform: uppercase;
		font-weight: 500;
	}
	.nav-pills .nav-link.active, .nav-pills .show>.nav-link 
	{
		color: #fff;
		background-color: #00BD9C;
	}
	table tr th
	{
		text-align: center;
		font-size: 14px;
	}
	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover 
	{
		background-color: #00BD9C;
		border-color: #00BD9C;
	}
	.pagination>li>a, .pagination>li>span 
	{
		color: #00BD9C;
	}
	.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover 
	{
		color: #fff;
		background-color: #00BD9C;
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
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row" style="margin-bottom: 30px;">
		<form action="" method="get">
			<?php echo e(csrf_field()); ?>

			<table border="0" width="100%" style="line-height: 50px; float: right;">
					<tr>
					<td width="60%" style="text-align: left; font-size: 30px; font-weight: bold;">Bệnh nhân đã hoàn thành</td>									
					<td width="20%">
						<input type="text" placeholder="Nhập tên bệnh nhân" class="input_data form-control" name="patient_name" value="<?php echo e(request()->patient_name); ?>"  autocomplete="off">
					</td >			
					<td width="10%" style="text-align: center; vertical-align: bottom;">
						<a href="#">
							<button class="btn-primary" type="submit">
								<i class="fas fa-search"></i>
								Search
							</button>
						</a>
					</td>					
					<td width="10%" style=" text-align: center; vertical-align: bottom;">
						<a href="#">
							<button class="btn-primary" type="button">
								<i class="fas fa-times"></i>
								Clear
							</button>
						</a>
					</td>				
				</tr>
			</table>
			<div style="text-align: left; color: red">
				<b>Tổng: <?php echo e($medical_bills->total()); ?> bệnh nhân</b>
			</div>	
		</form>
	</div>
</div>
	

<!-- Phần hiển thị bệnh nhân -->
<div class="container">
	<div class="row">
		<table width="100%" border="0" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">
			<thead>
				<tr class="header">
					<th style="padding-left: 10px;">
						<div>STT</div>
					</th>
					<th>
						<div>Tên bệnh nhân</div>
					</th>
					<th>
						<div>Mã bệnh nhân</div>
					</th>
					<th>
						<div>Thời gian khởi tạo</div>
					</th>
					<th>
						<div>Mã chỉ định</div>
					</th>
					<th>
						<div>Tên dịch vụ</div>
					</th>
					<th>
						<div>Trạng thái</div>
					</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php $__currentLoopData = $medical_bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical_bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="main">
					<td style="padding-left: 10px;">
						<div><?php echo e($i++); ?></div>
					</td>
					<td style="text-transform: uppercase;">
						<div name="patient_name"><?php echo e($medical_bill->first_name); ?> <?php echo e($medical_bill->last_name); ?></div>
					</td>
					<td>
						<div name="patient_id"><?php echo e($medical_bill->patient_id); ?></div>
					</td>
					<td>
						<span name="request_time"><?php echo e($medical_bill->schedule_time); ?></span>
						<span name="request_date"><?php echo e($medical_bill->schedule_date); ?></span>
					</td>
					<td>
						<div name="access_id"><?php echo e($medical_bill->accession_number); ?></div>
					</td>
					<td>
						<div name="device_name"><?php echo e($medical_bill->loai_thiet_bi); ?></div>
					</td>
					<td style="text-transform: uppercase;">
						<div name="status_id">
							<?php echo e(isset($medical_bill->status->name) ? $medical_bill->status->name : ""); ?>

						</div>
					</td>
					<td style="padding: 5px;">     
						<?php if($medical_bill->is_edited && $medical_bill->study_status == "3"): ?>
						<i class="fas fa-pen fa-lg" data-placement="bottom" data-toggle="tooltip" href="" title="Đã được chỉnh sửa"></i>
						<?php endif; ?>
						<?php if($medical_bill->study_status == "4"): ?>
						<i class="far fa-check-square fa-lg" data-placement="bottom" data-toggle="tooltip" href="" title="Hoàn tất"></i>
						<?php endif; ?>
					</td>
					<td style="padding: 5px;">
						<div class="float-right tooltip-right">
							<?php if($medical_bill->study_status == "4" || $medical_bill->study_status == "3"): ?>
							<a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="float-left" style="color: #2f4358;" href="<?php echo e(route('get.description.view', ['accession_number' => $medical_bill->accession_number])); ?>"><i class="fas fa-notes-medical fa-lg" style="color: blue;"></i></a>        
							<?php endif; ?>
						</div>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			</tbody>      
		</table>
		<div class="page-nav text-right">
			<nav aria-label="Page navigation">
				<?php echo e($medical_bills->appends([
					'content' => request()->content,
					'limit' => request()->limit
					])->links('vendor.pagination.admin_user')); ?>

				</nav>
			</div>
		</div>
	</div>
	<div class="top" style="display: none;"><i class="fas fa-arrow-up"></i></div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days);
		return date;
	}
	function last7Days(e){
		var today = new Date();
		var lastDay = today.addDays(-7);
		$(".to").val(formatDate(today));
		$(".from").val(formatDate(lastDay));
		e.preventDefault();
	}
	function toDay(e){
		var today = new Date();
		$(".to").val(formatDate(today));
		$(".from").val(formatDate(today));
		e.preventDefault();
	}
	function formatDate(date) {
		var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}
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