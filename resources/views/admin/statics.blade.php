@extends('admin.layouts.app')
@section('title','Admin statics')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style type="text/css">
    table th {
        text-align: center;
    }
    table th{
    text-align: center;
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
</style>
<div class="content-wrapper">
    
<div class="container">
 <div style="font-size: 30px; font-weight: bold;">
    <b>Tình hình phòng khám</b>
</div>
<!-- phần theo 6 tháng -->
<?php
	use Carbon\Carbon;
	$yt = Carbon::now()->year;
	$yt1 = $yt-1;
	$dt = Carbon::now()->month;
	if ($dt > 1) {
		$dt1 = $dt-1;
	}elseif ($dt <=1) {
		$dt1 = $dt+12-1;	
		$dt1 = $dt1.'/'.$yt1;
	}
	if ($dt > 2) {
		$dt2 = $dt-2;
	}elseif ($dt <=2) {
		$dt2 = $dt+12-2;	
		$dt2 = $dt2.'/'.$yt1;
	}
	if ($dt > 3) {
		$dt3 = $dt-3;
	}elseif ($dt <=3) {
		$dt3 = $dt+12-3;	
		$dt3 = $dt3.'/'.$yt1;
	}
	if ($dt > 4) {
		$dt4 = $dt-4;
	}elseif ($dt <=4) {
		$dt4 = $dt+12-4;	
		$dt4 = $dt4.'/'.$yt1;
	}
	if ($dt > 5) {
		$dt5 = $dt-5;
	}elseif ($dt <=5) {
		$dt5 = $dt+12-5;
		$dt5 = $dt5.'/'.$yt1;
	}
	if ($dt > 6) {
		$dt6 = $dt-6;
	}elseif ($dt <=6) {
		$dt6 = $dt+12-6;
		$dt6 = $dt6.'/'.$yt1;
	}
	if ($dt > 7) {
		$dt7 = $dt-7;
	}elseif ($dt <=7) {
		$dt7 = $dt+12-7;
		$dt7 = $dt7.'/'.$yt1;
	}
	if ($dt > 8) {
		$dt8 = $dt-8;
	}elseif ($dt <=8) {
		$dt8 = $dt+12-8;
		$dt8 = $dt8.'/'.$yt1;
	}
	if ($dt > 9) {
		$dt9 = $dt-9;
	}elseif ($dt <=9) {
		$dt9 = $dt+12-9;
		$dt9 = $dt9.'/'.$yt1;
	}
	if ($dt > 10) {
		$dt10 = $dt-10;
	}elseif ($dt <=10) {
		$dt10 = $dt+12-10;
		$dt10 = $dt10.'/'.$yt1;
	}
	if ($dt > 11) {
		$dt11 = $dt-11;
	}elseif ($dt <=11) {
		$dt11 = $dt+12-11;
		$dt11 = $dt11.'/'.$yt1;
	}


//phần đẩy dữ liệu tính doanh thu theo từng tháng
//$medical_bills = DB::table('medical_bills')->whereDate('schedule_date', '>=', $from)->whereDate('schedule_date', '<=', $dt);
//tính doanh thu theo từng tháng
$dataPoints = array( 	
	// array("y" => $dadung, "label" => "Tháng 1" ),
	array("y" => $tien_kham_11, "label" => "Tháng ".$dt11),
	array("y" => $tien_kham_10, "label" => "Tháng ".$dt10),
	array("y" => $tien_kham_9, "label" => "Tháng ".$dt9),
	array("y" => $tien_kham_8, "label" => "Tháng ".$dt8),
	array("y" => $tien_kham_7, "label" => "Tháng ".$dt7),
	array("y" => $tien_kham_6, "label" => "Tháng ".$dt6),
	array("y" => $tien_kham_5, "label" => "Tháng ".$dt5),
	array("y" => $tien_kham_4, "label" => "Tháng ".$dt4),
	array("y" => $tien_kham_3, "label" => "Tháng ".$dt3),
	array("y" => $tien_kham_2, "label" => "Tháng ".$dt2),
	array("y" => $tien_kham_1, "label" => "Tháng".$dt1 ),
	array("y" => $tien_kham_ht, "label" => "Tháng".$dt."/".$yt ),
);
 
?>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Doanh thu trong vòng 1 năm đến nay"
	},
	axisY: {
		title: "Tính theo vnđ"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## vnđ",//giá trị 
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<br>
<br>
<div style="text-align: center; font-size: 25px; font-weight: bold;">Doanh thu theo thuốc</div>
<div class="table-content">
    <div class="row">
        <table width="100%" border="0" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">
            <thead>
                <tr class="header">
                    <th class="text-center" width="5%">STT</th>                 
                    <th>Tên thuốc</th>
                    <!-- <th>Số lượng nhập</th> -->
                    <!-- <th>Nhà cung cấp</th> -->
                    <th>Số lô</th>
                    <th>Tồn kho</th>
                    <th>Doanh thu</th>
                    <!-- <th>Liều dùng</th> -->
                   <!--  <th>Giá bán</th>
                    <th>Giá nhập</th> -->
                   <!--  <th>Ngày nhập</th>     -->                             
                    <!-- <th>Hạn sử dụng</th> -->
                    <!-- <th>Đơn vị</th>
                    <th>Nhóm thuốc</th> -->
                   <!--  <th>Hành động</th> -->
                </tr>
            </thead>
            <tbody> 
               @foreach ($supplies as $key => $supplie) 
               <tr class="main">
                <td class="text-center">{{(($supplies->currentPage() - 1 ) * $supplies->perPage()) + ($key+1)}}</td>
                <td style="color: red" class="text-center"><b>{{$supplie->ten_thuoc}}</b></td>
                <!-- <td style="color: red" class="text-center"><b>{{$supplie->so_luong}}</b></td>
                <td class="text-center">{{$supplie->nha_cung_cap}}</td>  -->
                <td class="text-center">{{$supplie->lo_thuoc}}</td>
               <td class="text-center"> 
                    {{$supplie->con_lai}}                   
                </td>            
                <td class="text-center">
                    {{$supplie->doanh_thu}}
                </td>  
               <!--  <td class="text-center">{{$supplie->lieu_dung}}</td>   -->
                <!-- <td class="text-center">{{$supplie->gia_ban}}</td>
                <td class="text-center">{{$supplie->gia_nhap}}</td>  -->
              <!--   <td class="text-center">{{$supplie->ngay_nhap}}</td>          -->                   
                <!-- <td class="text-center">               
                    <span>
                        {{ $supplie->han_su_dung }}
                    </span>                
                </td>     -->       
               
            </tr>

            @endforeach

        </tbody>
    </table>
@endsection
@push('scripts')