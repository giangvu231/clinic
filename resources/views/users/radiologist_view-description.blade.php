@extends('layouts.view')
@section('title','Bác sĩ chuẩn đoán')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('module/dist/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/select2.min.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.main-btn
	{
		color: #fff;
		background-color: #3939f5;
		font-weight: 500;
	}
	.main-btn:hover
	{
		color: #ffff;
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
@endsection
@section('content-view')
<div class="container">       
  <form action="{{ route('addmorePost1', $medical_bill->accession_number) }}" method="POST">
   {{ csrf_field() }}
   <!-- Phần status =4  -->
   @if ($medical_bill->study_status == 4) 
   <div style="font-size: 25px; font-weight: bold; text-align: center; color: #337ab7">
    Bệnh nhân đã hoàn thành
  </div>
  <br>
  <div class="row">
   <div class="col-md-6">
    <div style="font-size: 20px; font-weight: bold; color: #337ab7">
      Phần thông số bệnh nhân
    </div>
    <table style="font-size: 16px; font-family: aria" border="0" width="100%">
      <tr>
        <td style="font-weight: bold;">Nhịp tim: {{ $medical_bill->nhip_tim }}</td>
        <td style="font-weight: bold;">Nhịp thở: {{ $medical_bill->nhip_tho }} </span></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Huyết áp: {{ $medical_bill->huyet_ap }} </span></td> 
        <td style="font-weight: bold;">Cân nặng: {{ $medical_bill->can_nang }} </td>  
      </tr>
      <tr>
        <td style="font-weight: bold;">Chiều cao: {{ $medical_bill->chieu_cao }} </td> 
        <td style="font-weight: bold;">Nhiệt độ: {{ $medical_bill->nhiet_do }} </td>    
      </tr>
      <tr>
        <td style="font-weight: bold;">SpO2: {{ $medical_bill->spO2 }} </td>  
        <td style="font-weight: bold;">Triệu chứng: {{ $medical_bill->reason }} </td>
      </tr>         
    </table>
  </div>

  <div class="col-md-6" style="text-align: center;">
    <div style="font-size: 20px; font-weight: bold; color: #337ab7">
      Phần kết quả khám
    </div>
    <table style="font-size: 16px; font-family: aria" border="0" width="100%">
      <tr>
        <td style="font-weight: bold;">Kết Luận: {{ $medical_bill->ket_luan }}</td>     
      </tr>
      <tr>
        <td style="font-weight: bold;">Điều trị: {{ $medical_bill->dieu_tri }} </span></td>      
      </tr>
      <tr>
        <td style="font-weight: bold;">Lời dặn: {{ $medical_bill->de_nghi }} </td>      
      </tr> 
      <tr>
        <td style="font-weight: bold;">Tiền Khám: {{ $medical_bill->tien_kham }} vnđ </td>      
      </tr> 
      <tr>
        <td>
          <a href="{{ route('get.print.pdf', $medical_bill->id) }}" style="color:#337ab7"><i class="fa fa-print" aria-hidden="true"></i><span>&nbsp;&nbsp;In kết quả</span></a>&nbsp;&nbsp; &nbsp;&nbsp;
          @if(Auth::user()->level_id == 4)
          <a href="{{ route('get.cancel.record', $medical_bill->id) }}" style="color: #337ab7;"><i class="fas fa-eraser" aria-hidden="true"></i><span>&nbsp;&nbsp; Sửa kết quả</span></a>
          @endif
        </td>
      </tr>       
    </table>
  </div>
</div> 
@endif

@if ($medical_bill->study_status == 3) 
<div class="row col-md-5">
  <div style="font-size: 30px; font-weight: bold; text-align: center; color: #337ab7;">
   Kết quả khám bệnh
 </div>

 <table class="table table-bordered" style="margin: 20px" border="0" width="100%" cellpadding="10">			
   <tr>
    <th width="10px">1.Chẩn đoán:</th>
    <td>
     <textarea style="margin-bottom: 10px; width: 100%"  id="ket_luan" name="ket_luan" style="width: 100%">{{ $medical_bill->ket_luan }}</textarea>
   </td>
 </tr>
 <tr>
  <th>2. Điều trị</th>
  <td>			
   <textarea style="margin-bottom: 10px; width: 100%"  id="dieu_tri" name="dieu_tri" style="width: 100%">{{ $medical_bill->dieu_tri }}</textarea>					
 </td>
</tr>
<tr>
  <th>3. Lời dặn</th>
  <td>			
   <textarea style="margin-bottom: 10px; width: 100%"  id="de_nghi" name="de_nghi" style="width: 100%">{{ $medical_bill->de_nghi }}</textarea>				
 </td>
 <tr hidden="">
  <th>4. Tiền Khám</th>
  <td>
     <textarea style="margin-bottom: 10px; width: 100%"  id="tien_kham" name="tien_kham" style="width: 100%">{{$medical_bill->tien_kham}}</textarea>     
 </td>
</tr>
<tr>
  <td colspan="2">
    <div style="text-align: center;">
      @if ($medical_bill->study_status == 3)
      <button type="submit" aria-hidden="true" style="color: #337ab7; background-color: #f5f5f5; border: none;" ><i class="fa fa-save"></i>&nbsp;&nbsp;<b>Lưu</b>
      </button>
      @endif
      &nbsp; &nbsp; &nbsp;
      @if ($medical_bill->isFinalize())
      <a href="{{route('get.radiologist.change_status', $medical_bill->id)}}" style="color: #337ab7"><i class="far fa-check-square"></i><span>&nbsp;&nbsp;Finalize</span></a>
      @endif
      &nbsp; &nbsp; &nbsp;
      <a href="{{ route('get.print.pdf', $medical_bill->id) }}" style="color: #337ab7;"><i class="fa fa-print" aria-hidden="true"></i><span>&nbsp;&nbsp;In kết quả</span></a>
    </div>    
  </td>
</tr>
</table>
</form>

<!-- form 2 lưu thuốc -->
<form action="{{ route('addmorePost', $medical_bill->accession_number) }}" method="POST">
 {{ csrf_field() }}
 @if ($errors->any())
 <div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <p>{{ Session::get('success') }}</p>
</div>
@endif
@endif					
</div>
@if ($medical_bill->study_status == 3)
<div class="row col-md-2"></div>
<!-- Phần kê đơn -->
<div class="row col-md-5">
  <div style="font-size: 30px; font-weight: bold; text-align: center; color: #337ab7;">
    Phần kê đơn thuốc
  </div>
  <div style="margin-top: 35px" border="0" width="100%">        
    <table class="table table-bordered" id="dynamicTable"> 
      <tr hidden="">
        <th colspan="1">Mã thuốc</th>
        <td colspan="3"><input type="text" class="form-control" name="supplies_id" id="ma_thuoc" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input></td>
      </tr> 
      <tr hidden="">
        <th colspan="1">Số lô</th>
        <td colspan="3"><input type="text" class="form-control" name="so_lo" id="so_lo" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input></td>
      </tr> 
      <tr>
        <th colspan="1">Tên thuốc</th>
        <td colspan="3"><input type="text" class="form-control" name="name" id="ten_thuoc" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input></td>
      </tr>
      <tr>
        <th width="30%">Số lượng</th>
        <td><input type="text" class="form-control" name="qty" id="SL_goi_y" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input>
        </td>
        <th width="30%"> Đơn vị</th>
        <td><input type="text" class="form-control" name="don_vi" id="don_vi" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input>
        </td>
      </tr>
      <tr>
        <th colspan="1">Liều dùng</th>
        <td colspan="3"><input type="text" class="form-control" name="lieu_dung" id="lieu_dung" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;"></input></td>
      </tr>
      <tr hidden="">
        <th colspan="1">Giá thành</th>
        <td colspan="3">
          <input type="text" class="form-control" name="gia_ban" id="gia_ban" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;">
          <input type="text" class="form-control" name="gia_nhap" id="gia_nhap" cols="30" rows="3" style="width: 100%; margin-bottom: 20px;">            
          </input>
        </td>
      </tr>
      <tr>
        <td colspan="1"> <button type="submit" id="keyup" aria-hidden="true" style="color: #337ab7; background-color: #f5f5f5; border: none; text-align: center;" ><i class="fa fa-save"></i>&nbsp;&nbsp;<a><b>Thêm</b></a>
        </button></td>
        <td colspan="3">
          @if ($medical_bill->study_status == 3)
          <div style="float: right; width: 100%" class="input-group">
            <span class="input-group-addon"><b>Gợi ý chọn thuốc</b></span>
            <select style="padding: 5px;" id="searchTemplate" class="select_supplies" name="templates_pdf">
              <option selected="selected" value="" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn thuốc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
              <?php 
              $supplies = DB::table('supplies')->where('trang_thai', 1)->get() 
            
              ?>
              @foreach($supplies as $supplies)
              <option style="text-align: center;" value="{{ $supplies->ma_thuoc }}">{{$supplies->ten_thuoc}}</option>
              @endforeach
            </select>
          </div>
        </td>
      </tr>
      </div>      
           
    </table> 
    @endif 
  </form>
</div>

<script>
  addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
     event.preventDefault();
     document.getElementById("myBtn").click();
   }
 });
</script>


</div>
</div>
@endif
<br>

<!-- Phần hiển thị bảng thuốc -->


@if ($medical_bill->study_status == 3)
  <div style="font-size: 30px; font-weight: bold; text-align: center; color: #337ab7;">
    Danh sách thuốc kê
  </div>
  <br>
  <div class="container">
    <table width="100%" border="1" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">    
      <tr>
        <th width="5%">STT</th>
        <th width="20%">Tên thuốc</th>
        <th width="10%">Số lượng</th>        
        <th width="30%">Liều dùng</th>
        <th width="5%">Đơn vị</th>
        <th>action</th>
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
        <td>
          <div name="name">{{ $product_stocks->don_vi }}</div>
        </td>
        <td>
          <a href="{{ route('del.product_stocks',['id'=>$product_stocks->id]) }}" onclick="return confirm('Bạn có chắc chắn xóa?')"><i class="fa fa-times-circle" style="color: red; cursor: pointer;"></i></a>
        </td>    
      </tr>   
      @endforeach 
    </table>
  </div>
@elseif ($medical_bill->study_status == 4)
  <br>
  <div class="container">
    <table width="100%" border="1" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">    
      <tr>
        <th width="5%">STT</th>
        <th width="20%">Tên thuốc</th>
        <th width="5%">Số lượng</th>
        <th width="25%">Liều dùng</th>
        <th width="5%">Đơn vị</th>
        <th width="20%">Tiền thuốc</th>
      </tr> 
        <div style="display: none">
            {{ $total = 0 }}
            {{$tien_kham = $medical_bill->tien_kham}}         
        </div>
      <?php $i = 1 ?>
      @foreach ($product_stocks as $key => $product_stocks)
      <div style="display: none;">
            {{$posts_id = $product_stocks->posts_id}} 
            <?php 
             $thanh_toan = DB::table('posts')->where('ProductStocks_id', $posts_id)->sum('thanh_toan');
            ?> 

      </div>   
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
        <td>
          <div name="name">{{ $product_stocks->don_vi }}</div>
        </td>
        <td>
          <div>{{$thanh_toan}} vnđ</div>
          <div style="display: none">{{$total += $thanh_toan}}</div>       
        </td>
      </tr>       
      @endforeach 
      <tr>
        <th colspan="2" ></th>       
        <td></td>
        <th colspan="2"> Tiền khám : </th>
        <td>{{$medical_bill->tien_kham}} vnđ</td>  
           
      </tr>
      <tr>
        <th colspan="2" ></th>
        <td></td>
        <th colspan="2">Tổng tiền thanh toán :</th>
        <th>{{$total + $tien_kham}} vnđ </th>
      
      </tr>


    </table>
  </div>
@endif 

</section>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('dist/js/select2.min.js') }}"></script>
<script src="{{url('dist/js/script.js')}}"></script>



<script type="text/javascript">
	function openNewWindow(url) {
		var params = [
		'height='+screen.height,
		'width='+screen.width,
		'scrollbars=yes',
		'status=yes',
		'location=yes'
		].join(',');
		var popup = window.open(url, 'popup_window', params); 
		popup.moveTo(0,0);
	};

	$("#btn_printer").click(function(){
		window.location.href= "{{route('get.radiologist.printer')."?accession_number=".$medical_bill->accession_number }}";
	});

	$(".select_supplies").change(function() {
		var id = $(this).val();
		var postData = "ma_thuoc=" + id;
		console.log(postData);
            // debugger;
            var url = "{{route('post.radiologist.supplies')}}";
            console.log(url);

            var http = new XMLHttpRequest();
            console.log(http);
            http.open('POST', url, true);
            
            //Send the proper header information along with the request
            http.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            http.onreadystatechange = function() {//Call a function when the state changes.
            	if(http.readyState == 4 && http.status == 200) {
                var ma_thuoc = JSON.parse(http.responseText).ma_thuoc;
                var ten_thuoc = JSON.parse(http.responseText).ten_thuoc;
                 var so_lo = JSON.parse(http.responseText).so_lo;
                var SL_goi_y = JSON.parse(http.responseText).SL_goi_y;
                 var lieu_dung = JSON.parse(http.responseText).lieu_dung;
                var don_vi = JSON.parse(http.responseText).don_vi;
                var gia_ban = JSON.parse(http.responseText).gia_ban;
                var gia_nhap = JSON.parse(http.responseText).gia_nhap;
                var mo_ta = JSON.parse(http.responseText).mo_ta;
                if(ten_thuoc != "false" && SL_goi_y != "false" && don_vi != "false" && gia_ban != "false" && mo_ta != "false" && ma_thuoc != "false" && lieu_dung != "false" && gia_nhap != "false"  ) {
                  $('#ma_thuoc').val(ma_thuoc);
                  $('#ten_thuoc').val(ten_thuoc);
                  $('#so_lo').val(so_lo);
                  $('#SL_goi_y').val(SL_goi_y);
                  $('#lieu_dung').val(lieu_dung);
                  $('#don_vi').val(don_vi);
                  $('#gia_ban').val(gia_ban);
                  $('#gia_nhap').val(gia_nhap);
                  $('#mo_ta').val(mo_ta);
                } else {
                 alert("Không tồn tại thuốc tương ứng");
               }
             }
           }
           http.send(postData);
         });
  $(document).ready(function(){
   $("#searchTemplate").select2({});
 })
</script>
</script>
</script>
@endsection

