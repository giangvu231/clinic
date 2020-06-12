@extends('layouts.app')
@section('title','Bác sĩ chuẩn đoán')
@section('css')
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
		background-color: #00BD9C;
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
	table tr th
	{
		text-align: center;
		font-size: 14px;
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
@endsection
@section('content')
<div class="container">
	<div class="row">
		<table border="0" width="100%" style="margin-bottom: 30px;">
			<tr>
				<td width="50%" style="text-align: left; font-size: 30px; font-weight: bold;">Bệnh nhân đang chờ khám </td>
				<td>
					<form action="" method="get">
						{{ csrf_field() }}
						<table border="0" width="80%" style="line-height: 50px; float: right;">
							<tr>					
								<td>
									<input type="text" placeholder="Nhập tên bệnh nhân" class="input_data form-control" name="patient_name" value="{{request()->patient_name}}"  autocomplete="off">
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
								<!-- <td>							
									<a href="{{ route('get.order.view') }}">
										<button style="font-size: 12px; " class="btn-primary" type="button">
											<i class="fas fa-magic"></i>
											Tạo mới
										</button>
									</a>									
								</td>	 -->				
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- <div class="container">
	<div class="row" style="margin-bottom: 30px;">
		<form action="" method="get">
			{{ csrf_field() }}
			<table border="0" width="100%" style="line-height: 50px;">
				<tr>
					<td><input type="text" placeholder="Nhập mã bệnh nhân" class="input_data form-control" name="patient_id" value="{{request()->patient_id}}" style="width: 93%;" autocomplete="off"></td>
					<td><input type="text" placeholder="Nhập tên bệnh nhân" class="input_data form-control" name="patient_name" value="{{request()->patient_name}}" style="width: 93%;" autocomplete="off"></td>
					<td><input type="text" name="access_id" placeholder="Nhập mã chỉ định" class="input_data form-control" value="{{request()->access_id}}"  style="width: 93%;"></td>
					<td style="width: 15%; text-align: center; vertical-align: bottom;">
						<a href="#">
							<button class="btn-primary" type="submit">
								<i class="fas fa-search"></i>
								Search
							</button>
						</a>
					</td>
					<td style="width: 15%; text-align: center; vertical-align: bottom;">
						<a href="javascript:void(0)">
							<button class="btn-primary" type="" onclick="toDay(event)" name="today">
								<i class="fas fa-calendar" aria-hidden="true"></i>
								Today
							</button>
						</a>
					</td>
				</tr>
				<tr>
					<td>
						<div class="input-group">
							<span class="input-group-addon">Từ ngày</span> 
							<input style="width: 90%;" type="date" name="date_from" id="from" class="from datepicker input_data form-control" placeholder="yyyy-mm-dd" value="{{request()->date_from}}"/>
						</div>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">Đến ngày</span> 
							<input style="width: 90%;" type="date" name="date_to" id="to" class="to input_data form-control" placeholder="yyyy-mm-dd" value="{{request()->date_to}}"/>
						</div>
					</td>
					<td>
						<div class="input-group">
						<span class="input-group-addon">Chọn hiển thị</span>
						<select name="limit" class="form-control" onchange="location = this.value">
							<option selected value="">Lựa chọn</option>
							<option value="{{route('get.reporting.view', ['limit' => 10])}}">10</option>
							<option value="{{route('get.reporting.view', ['limit' => 20])}}">20</option>
							<option value="{{route('get.reporting.view', ['limit' => 50])}}">50</option>
							<option value="{{route('get.reporting.view', ['limit' => 100])}}">100</option>
						</select>
					</div>
						
					</td>
					<td style="width: 15%; text-align: center; vertical-align: bottom;">
						<a href="#">
							<button class="btn-primary" type="button">
								<i class="fas fa-times"></i>
								Clear
							</button>
						</a>
					</td>
					<td style="width: 15%; text-align: center; vertical-align: bottom;">
						<a href="javascript:void(0)">
							<button  class="btn-primary" type="" onclick="last7Days(event)" name="last_day">
								Last 7 days
							</button>
						</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div> -->
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
						<div>Họ và tên</div>
					</th>
					<th>
						<div>ID</div>
					</th>
					<th>
						<div>Thời gian tiếp nhận</div>
					</th>
					<th>
						<div>Mã tiếp nhận</div>
					</th>
					<th>
						<div>Lý do tiếp nhận</div>
					</th>
					<!-- <th></th>
					 -->
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				@foreach ($medical_bills as $medical_bill)
				<tr ondblclick="window.location.href = '{{ route('get.description.view', ['accession_number' => $medical_bill->accession_number]) }}';" class="main" id="view-radiologist">
					<td style="padding-left: 10px;">
						<div>{{ $i++ }}</div>
					</td>
					<td style="text-transform: uppercase;">
						<div name="patient_name">{{ $medical_bill->first_name }} {{ $medical_bill->last_name }}</div>
					</td>
					<td>
						<div name="patient_id">{{ $medical_bill->patient_id }}</div>
					</td>
					<td>
						
						<span name="request_date">{{ $medical_bill->schedule_date }}</span>
					</td>
					<td>
						<div name="access_id">{{ $medical_bill->accession_number }}</div>
					</td>
					<td>
						<div name="device_name">{{ $medical_bill->reason }}</div>
					</td>
<!-- 					<td>
						<input type="checkbox" id="choose" name="choose" value="{{ $medical_bill->accession_number }}">
					</td> -->					
					
					<!-- <td style="padding: 5px; font-size: 10px;">     
						@if ($medical_bill->is_edited)
						<i data-placement="bottom" data-toggle="tooltip" href="" title="Đã được chỉnh sửa"></i>
						@endif
						@if($medical_bill->study_status == "4")
						<i class="far fa-check-square fa-lg" data-placement="bottom" data-toggle="tooltip" href="" title="Hoàn tất"></i>
						@endif
					</td> -->
					
					
				</tr>
				@endforeach 
			</tbody>      
		</table>
		<div class="page-nav text-right">
			<nav aria-label="Page navigation">
				{{$medical_bills->appends([
					'content' => request()->content,
					'limit' => request()->limit
					])->links('vendor.pagination.admin_user')}}
				</nav>
			</div>
		</div>
	</div>
	<div class="top" style="display: none;"><i class="fas fa-arrow-up"></i></div>
</section>
@endsection
@section('scripts')
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
@endsection