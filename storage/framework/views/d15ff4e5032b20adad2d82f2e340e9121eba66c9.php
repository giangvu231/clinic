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
		/*background-color: #00BD9C;*/
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
		color: #00E7C1;
	}
	.fa-arrow-alt-circle-right:hover
	{
		color: #00E7C1;
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
	<div class="row">
		<table border="0" width="100%" style="margin-bottom: 30px;">
			<tr>
				<td width="30%" style="text-align: left; font-size: 30px; font-weight: bold;">Danh sách bệnh nhân &nbsp;&nbsp;
					
				</td>
				<td>
					<form action="" method="get">
						<?php echo e(csrf_field()); ?>

						<table border="0" width="80%" style="line-height: 50px; float: right;">
							<tr>					
								<td>
									<input type="text" placeholder="Nhập tên bệnh nhân" class="input_data form-control" name="patient_name" value="<?php echo e(request()->patient_name); ?>"  autocomplete="off">
								</td>			
								<td style="text-align: center; vertical-align: bottom;">
									<a href="#">
										<button class="btn-primary" type="submit">
											<i class="fas fa-search"></i>
											Search
										</button>
									</a>
								</td>					
								<td style=" text-align: center; vertical-align: bottom;">
									<a href="#">
										<button class="btn-primary" type="button">
											<i class="fas fa-times"></i>
											Clear
										</button>
									</a>
								</td>
								<td>							
									<a href="<?php echo e(route('get.order.view')); ?>">
										<button style="font-size: 12px; " class="btn-primary" type="button">
											<i class="fas fa-magic"></i>
											Tạo mới
										</button>
									</a>									
								</td>					
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php if(Session::has('success')): ?>
<div class="alert alert-success text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <p><?php echo e(Session::get('success')); ?></p>
</div>
<?php endif; ?>
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
						<div>Ngày sinh</div>
					</th>
					<th>
						<div>Mã chỉ định</div>
					</th>
					<th>
						<div>Trạng thái</div>
					</th>
					<th colspan="2"></th>				
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php $__currentLoopData = $medical_bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medical_bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="main">
					<td style="padding-left: 10px; ">
						<div><?php echo e($i++); ?></div>
					</td>
					<td style="text-transform: uppercase;">
						<div name="patient_name"><?php echo e($medical_bill->first_name); ?> <?php echo e($medical_bill->last_name); ?></div>
					</td>
					<td>
						<div name="patient_id"><?php echo e($medical_bill->patient_id); ?></div>
					</td>
					<td>
					<?php if($medical_bill->study_status == "4"): ?>					
					<?php 
							$dt = Carbon\Carbon::now();
							$dt1 = $dt->subDays(1);   						
    						$today = now();
						 ?>
						 <?php 
							$mt = Carbon\Carbon::now();												
    						$dt5 = $mt->subDays(5);    					
						 ?>
						<?php if($medical_bill->schedule_date < $dt5): ?>
						<span name="request_date"><b><?php echo e($medical_bill->schedule_date); ?></b></span>
						<?php elseif($medical_bill->schedule_date < $dt1 &&  $medical_bill->schedule_date > $dt5 ): ?>
						<span name="request_date" style="color: red"><b><?php echo e($medical_bill->schedule_date); ?></b></span>
						<?php elseif($medical_bill->schedule_date < $today &&  $medical_bill->schedule_date > $dt1): ?>
						<span name="request_date" style="color: blue"><b><?php echo e($medical_bill->schedule_date); ?></b></span>
						<?php else: ?>
						<span name="request_date"><?php echo e($medical_bill->schedule_date); ?></span>
						<?php endif; ?>
					<?php else: ?>
					<span name="request_date"><?php echo e($medical_bill->schedule_date); ?></span>
					<?php endif; ?>
					</td>					
					<td>
						<div name="device_name"><?php echo e($medical_bill->birth_date); ?></div>
					</td>
					<td>
						<div name="access_id"><?php echo e($medical_bill->accession_number); ?></div>
					</td>
					<td style="text-transform: uppercase; font-size: 10px;">
						<?php if($medical_bill->study_status == "3" || $medical_bill->study_status == "4"): ?>
						<div name="status_id">
							<?php echo e(isset($medical_bill->status->name) ? $medical_bill->status->name : ""); ?>

						</div>
						<?php endif; ?>						
					</td>						
					<td style="padding: 5px;">
						<div class="float-right tooltip-right">
						<?php if($medical_bill->study_status == "4"): ?>
							<a data-placement="bottom" data-toggle="tooltip" title="Tái khám" class="float-left" style="color: #2f4358;" href="<?php echo e(route('get.reorder.view', ['accession_number' => $medical_bill->accession_number])); ?>"><i class="fas fa-notes-medical fa-lg" style="color: blue;"></i></a>							
						<?php endif; ?>   
						<?php if($medical_bill->study_status == "3" && $medical_bill->is_edited == "0"): ?>
						<a href="<?php echo e(route('del.medical_bill',['id'=>$medical_bill->id])); ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa khỏi hàng chờ"><i class="fa fa-trash" style="color: red; cursor: pointer;"></i></a>
						<?php endif; ?> 
						<?php if($medical_bill->is_edited == "1" && $medical_bill->study_status == "3"): ?>
						<i class="fa fa-ambulance" data-placement="bottom" data-toggle="tooltip" href="" title="Đang khám"></i>
						<?php endif; ?>
							
						</div>
					</td>
					<td>
						<div class="float-right tooltip-right">
						<?php if($medical_bill->study_status == "4"): ?>
						<a data-placement="bottom" data-toggle="tooltip" title="Chi tiết" class="float-left" style="color: #2f4358;" href="<?php echo e(route('get.description.view', ['accession_number' => $medical_bill->accession_number])); ?>"><i class="fas fa-magic fa-lg" style="color: green;"></i></a>
						<?php elseif($medical_bill->study_status == "3"): ?>
						<div class="float-right tooltip-right">
						<a data-placement="bottom" data-toggle="tooltip" title="Chỉnh sửa" class="float-left" style="color: #2f4358;" href="<?php echo e(route('edit_par', ['id' => $medical_bill->id])); ?>"><i class="fas fa-edit fa-lg"></i></a>
						</div>
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