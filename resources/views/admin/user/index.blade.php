@extends('admin.layouts.app')
@section('title','Admin User')
@section('css')
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
@endsection
@section('content')
    <div class="content-wrapper">
            <div class="topbar topbar-wrap">
                    <div class="top-title fleft">
                      <h2>Danh sách nhân viên</h2>
                    </div>
                    <div class="top-menu fright">
                      <ul class="list-inline">
                        <li><a href="{{route('admin.index')}}"><i class="fa fa-tachometer"></i></a></li>
                        <li><a href="{{route('admin.index')}}">Quản trị</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="{{route('admin.user.index')}}">Danh sách nhân viên</a></li>
                      </ul>
                    </div>
                    <div class="clear-fix">  </div>
                  </div>
        <div class="list-account">
            <div class="content-top">
                <form action="">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" name="hoten"
                                       placeholder="Nhập họ và tên"/>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option selected="selected" value="" disabled="">Lựa chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="row">
					<p style="text-align: center;color:blue;font-size: 20px;margin:0px;padding:5px;font-weight: 700">{{session()->has('message') ? session()->get('message'): ""}}</p>
                    
					<div class="col-sm-12 col-xs-12 text-left">
                        <b>Tổng: {{ isset($users) ? $users->total() : ""}}</b>
                    </div>
                </div>
            </div>
            <div class="table-content">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="3%">STT</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Tên tài khoản</th>
                            <th class="text-center">Số điện thoại</th>
                            <!-- <th class="text-center">Mã bác sỹ</th> -->
							<th class="text-center">Chức vụ</th>
							<th class="text-center">Trạng thái</th>
                            <!-- <th class="text-center">Ngày tạo</th> -->
							<th width="20%" class="text-center">Điều khiển</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{(($users->currentPage() - 1 ) * $users->perPage()) + ($key+1)}}</td>
                                <td class="text-center">{{$user->hoten}}</td>
                                <td class="text-center">{{$user->userid}}</td>
                                <td class="text-center">{{$user->dien_thoai}}</td>
								<!-- <td class="text-center">{{$user->chung_thu_so}}</td> -->
								<td class="text-center">{{$user->level->name}}</td>
                                @if ($user->status === 1)
                                    <td class="text-center">Hoạt động</td>
                                @elseif ($user->status === 0)
                                    <td class="text-center">Ẩn</td>
                                @endif
								<!-- <td>{{$user->created_at}}</td> -->
                                <td class="edit text-center">
                                    <button class="Cham" title="chấm công" style="width: 40px; height: 33px;">
                                        <i class="fa fa-id-badge"></i>
                                    </button>
                                    <a class="btn btn-info" href="{{route('admin.user.edit',$user)}}"><i class="fa fa-edit"></i></a>
                                    <a type="button" class="btn btn-danger delete" data-name="{{ $user->hoten }}" data-url="{{ route('admin.user.destroy', ['id' => $user->id]) }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" aria-hidden="true"></i></a>                       
                                </td>
                            </tr>
                            <!-- xem chi tiết -->
                            <tr class="table-hide">
                                <td colspan="10">
                                    <div class="drop-menu-table Statistical__list">
                                        <form action="{{route('post_cham_cong')}}" method="POST">
                                                {{ csrf_field() }}
                                            <div class="row">
                                                <div style="font-size: 20px"><b>Chấm công ngày </b>
                                                    <input type="date" name="ngay_cham" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <br>
                                                <div class="col-md-5">
                                                    <b>Tên nhân viên :</b>  
                                                    <b>
                                                        <input readonly type="text" name="ten_nv" value="{{$user->hoten}}">
                                                    </b>
                                                </div> 
                                                <div hidden="" class="col-md-5">
                                                    <b>Mã nhân viên</b>  
                                                    <b>
                                                        <input readonly type="text" name="ma_nv" value="{{$user->userid}}">
                                                    </b>
                                                </div>
                                                <div class="col-md-5">
                                                    <b>Chức vụ :</b>  
                                                    <b>
                                                        <input readonly type="text" value="{{$user->level->name}}">
                                                    </b>
                                                </div>                                                 
                                                <br>
                                                <br>                                                 
                                                <div>
                                                    <!-- <div class="col-md-5">
                                                    <b>Mức lương :</b>  
                                                    <b>
                                                        @if ($user->level->id == 4)
                                                        <input readonly type="text" name="muc_luong" value="300000">
                                                        @elseif ($user->level->id == 3)
                                                        <input readonly type="text" name="muc_luong" value="200000">
                                                        @endif
                                                    </b>
                                                    </div>  -->
                                                    <div class="col-md-2">
                                                        <b>Chọn thời gian : </b>                                                       
                                                    </div>
                                                    <div class="col-md-3">
                                                         <select class="form-control" name="so_cong">
                                                            <option value="1">Nửa ngày</option>
                                                            <option value="2">Một ngày</option>
                                                        </select>
                                                    </div>                                                    
                                                </div>                                               
                                            </div>                                            
                                            <div class="row text-right">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 0px;">Chấm công</button>
                                                <button class="btn btn-primary clear" style="margin-top: 0px;">Hủy bỏ</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-nav text-right">
                <div class="row">
                    <nav aria-label="Page navigation">
                        {{$users->appends([
                            'username' => request()->username,
                            'level_id' => request()->level_id,
                            'status' => request()->status,
							'limit' => request()->limit
                        ])->links('vendor.pagination.admin_user')}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xóa</h4>
        </div>
        <div class="modal-body">
          <p>Bạn sẽ xóa tài khoản <b id="name_form"></b></p>
        </div>
        <div class="modal-footer">
            <div class="button-group">
                <form id="delete-form" action="" method="POST" style="display: inline-block;">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                </form>
                        
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
            </div>
            
        </div>
      </div>
  
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $('.delete').click(function (event) {
            var link_recycle = $(this).data('url');
            var modalID = $(this).data('target');
            var name = $(this).data('name');
            $("#delete-form").attr('action', link_recycle);
            $("#name_form").text(name);
        });
    </script>
    <script>
        $('.Cham').click(function (e) { 
            e.preventDefault();
            
            var is_actived = $(this).closest("tr").next(".table-hide").hasClass("active");

            if(is_actived) {
                $(".table-hide").removeClass("active");   
                return;
            }
            $(".table-hide").removeClass("active");
            $(this).closest("tr").next(".table-hide").addClass("active");
            return;
        });
    </script>
@endpush