@extends('admin.layouts.app')
@section('title','Quản lý vật tư/Thuốc')
@section('css')
<style type="text/css">
   .edit a{
    background: #3C8DBC;
    border: 1px solid transparent;
    -webkit-border-radius: 3px; 
    border-radius: 3px;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    outline: none;
    color: #f5f5f5;
    vertical-align: middle;
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

@endsection
@section('content')
<body style="font-family: time new roman">
    <div class="content-wrapper">
    <div class="topbar topbar-wrap">
        <div class="top-title fleft">
          <h2>Danh sách thuốc</h2>
      </div>
      <div class="top-menu fright">
          <ul class="list-inline">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-tachometer"></i></a></li>
            <li><a href="{{route('admin.index')}}">Quản trị</a></li>
            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
            <li><a href="{{route('admin.supplies.index')}}">Danh sách thuốc</a></li>

        </ul>
    </div>
    <div class="clear-fix">  </div>
</div>
<div class="list-account">    
<form action="" method="get">
    {{ csrf_field() }}      



<div class="col-md-3">
    <button type="btn-primary"  style="font-weight: bold;height: 33px; color: white; background-color: #3c8dbc;border: 0; " name="tat_ca">
        Tất cả
    </button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button type="btn-primary" style="color: white; font-weight: bold;height: 33px;background-color: red;border: 0;"  name="canh_bao">
        Cảnh báo hết hạn
    </button>    
</div> 
<div class="col-md-2">
    <!-- <select id="select-beast" class="form-control" class="demo-default" placeholder="Tên mẫu...." name="nhom_thuoc" style="width: 90%">
        @foreach($supplies as $supplie)
        <option value="{{$supplie->nhom_thuoc}}">{{$supplie->nhom_thuoc}}</option>
        @endforeach
    </select> -->
    <select id="select-beast" class="form-control" class="demo-default" placeholder="Tên mẫu...." name="nhom_thuoc" style="width: 90%;background: #ffcc00; color: white; font-weight: bold;">
        <option select-beast value="">Nhóm thuốc</option>
        @if(isset($nhom_thuoc))
        @foreach($nhom_thuoc as $loai)
        <option value="{{$loai->nhom_thuoc}}" {{ (request()->nhom_thuoc == $loai->nhom_thuoc) ? 'selected' : "" }}>{{$loai->nhom_thuoc}}</option>
        @endforeach
        @endif
    </select>
</div> 
<div class="col-md-3">
    <input style="width: 200px; float: right; color: white;" type="text" placeholder="Nhập tên thuốc" class="input_data form-control" name="ten_thuoc" value="{{request()->ten_thuoc}}"  autocomplete="off">    
</div>
<div class="col-md-2">
    <button style="float: left;font-weight: bold;height: 33px; color: white; background-color: #3c8dbc;border: 0;" type="submit">
        Tìm kiếm
    </button>   
</div>
</form>
<br>
<br>
<br>

<div class="table-content">
    <div class="row">
        <table width="100%" border="0" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">
            <thead>
                <tr class="header">
                    <th class="text-center" width="5%">STT</th>  
                    <th class="text-center" width="15%" >Mã thuốc</th>                 
                    <th>Tên thuốc</th>
                    <!-- <th>Số lượng nhập</th> -->
                    <!-- <th>Nhà cung cấp</th> -->
                    <th>Số lô</th>
                    <th>Tồn kho</th>
                    <!-- <th>Doanh thu</th>
                    <th>Liều dùng</th> -->
                    <th>Giá bán</th>
                    <th>Giá nhập</th>
                   <!--  <th>Ngày nhập</th>     -->                             
                    <th>Hạn sử dụng</th>
                    <!-- <th>Đơn vị</th>
                    <th>Nhóm thuốc</th> -->
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody> 
               @foreach ($supplies as $key => $supplie)
                <?php
                $dt = Carbon\Carbon::now();
                $dt7 = $dt->addDays(7);                    
                ?>
                @if ($supplie->han_su_dung < $dt7 && $supplie->so_luong != 0)    
               <tr class="main" style="background-color: pink;">
                <td class="text-center">{{(($supplies->currentPage() - 1 ) * $supplies->perPage()) + ($key+1)}}</td>
                <td class="text-center">{{$supplie->ma_thuoc}}</td>
                <td style="color: red" class="text-center"><b>{{$supplie->ten_thuoc}}</b></td>
                <!-- <td style="color: red" class="text-center"><b>{{$supplie->so_luong}}</b></td>
                <td class="text-center">{{$supplie->nha_cung_cap}}</td>  -->
                <td class="text-center">{{$supplie->lo_thuoc}}</td>
               <td class="text-center"> 
                    {{ $supplie->con_lai }}                   
                </td>
            
               <!--  <td class="text-center">
                    {{ $supplie->doanh_thu }}
                </td>  
                <td class="text-center">{{$supplie->lieu_dung}}</td>   -->
                <td class="text-center">{{$supplie->gia_ban}}</td>
                <td class="text-center">{{$supplie->gia_nhap}}</td> 
              <!--   <td class="text-center">{{$supplie->ngay_nhap}}</td>          -->                   
                <td class="text-center">               
                    <span>
                        {{ $supplie->han_su_dung }}
                    </span>                
                </td>                 
                <!-- <td class="text-center">{{$supplie->don_vi}}</td> 
                <td class="text-center">{{$supplie->nhom_thuoc}}</td>   -->
                <td style="text-align: center; font-size: 20px">
                    <a href="{{ route('get_add_supp', ['id' => $supplie->id]) }}" title="Nhập thêm"><i class="fa fa-plus" style="color: blue; cursor: pointer; "></i></a>
                     <a data-placement="bottom" data-toggle="tooltip" title="Chi tiết" class="float-left" style="color: #2f4358;" href="{{ route('edit_supp', ['id' => $supplie->id]) }}"><i class="fa fa-edit "></i></a>
                     <!-- <a href="{{ route('showHet', ['id' => $supplie->id]) }}" title="Chi tiết"><i class="fa fa-magic" style="color: green; cursor: pointer; "></i></a> -->
                     <a href="{{ route('del.supplies',['id'=>$supplie->id]) }}" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa?')"><i class="fa fa-trash" style="color: red; cursor: pointer; "></i></a>
                    
                </td>
            </tr>
             @elseif ($supplie->han_su_dung >= $dt7 && $supplie->so_luong != 0)
                 <tr class="main">
                <td class="text-center">{{(($supplies->currentPage() - 1 ) * $supplies->perPage()) + ($key+1)}}</td>
                <td class="text-center">{{$supplie->ma_thuoc}}</td>
                <td style="color: red" class="text-center"><b>{{$supplie->ten_thuoc}}</b></td>
               <!--  <td style="color: red" class="text-center"><b>{{$supplie->so_luong}}</b></td>
                <td class="text-center">{{$supplie->nha_cung_cap}}</td>  -->
                <td class="text-center">{{$supplie->so_lo}}</td> 
        
                <td class="text-center"> 
                    {{ $supplie->con_lai }}                   
                </td>
            
               <!--  <td class="text-center">
                    {{ $supplie->doanh_thu }}
                </td>  
                <td class="text-center">{{$supplie->lieu_dung}}</td>   -->
                <td class="text-center">{{$supplie->gia_ban}}</td>
                <td class="text-center">{{$supplie->gia_nhap}}</td> 
                <!-- <td class="text-center">{{$supplie->ngay_nhap}}</td>           -->                  
                <td class="text-center">               
                    <span>
                        {{ $supplie->han_su_dung }}
                    </span>                
                </td>                 
               <!--  <td class="text-center">{{$supplie->don_vi}}</td> 
                <td class="text-center">{{$supplie->nhom_thuoc}}</td>   -->
                <td style="text-align: center; font-size: 20px">
                        <a href="{{ route('get_add_supp', ['id' => $supplie->id]) }}" title="Nhập thêm"><i class="fa fa-plus" style="color: blue; cursor: pointer; "></i></a>
                     <a data-placement="bottom" data-toggle="tooltip" title="Chi tiết" class="float-left" style="color: #2f4358;" href="{{ route('edit_supp', ['id' => $supplie->id]) }}"><i class="fa fa-edit "></i></a>
                     <!-- <a href="{{ route('showHet', ['id' => $supplie->id]) }}" title="Chi tiết"><i class="fa fa-magic" style="color: green; cursor: pointer; "></i></a> -->
                     <a href="{{ route('del.supplies',['id'=>$supplie->id]) }}" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa?')"><i class="fa fa-trash" style="color: red; cursor: pointer; "></i></a>

                </td>
            </tr>
             @endif
            @endforeach

        </tbody>
    </table>
</div>
</div>
</body>

@endsection