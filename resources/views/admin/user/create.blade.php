@extends('admin.layouts.app')
@section('title','Tạo mới tài khoản')
@section('content')
    <div class="content-wrapper">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Tạo mới tài khoản</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
					<li><a href="{{route('admin.index')}}"><i class="fa fa-tachometer"></i></a></li>
					<li><a href="{{route('admin.index')}}">Quản trị</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<li><a href="{{route('admin.user.create')}}">Tạo nhân viên mới</a></li>
				 </ul>
            </div>
            <div class="clear-fix">  </div>
        </div>
        <div class="add-account">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <form id="create-user-form" action="{{route('admin.user.store')}}" method="POST">
						{{ csrf_field() }}
						@if(session()->has('error'))
							<p style="color:red; text-align:center;">{{session()->get('error')}}</p>
						@endif
                        <div class="row">
                            <div class="col-md-4">
                                <p>Họ và tên:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="hoten" value="" type="text"/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Tên tài khoản:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="userid" value="" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Số điện thoại:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="dien_thoai" value="" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Số di động:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="di_dong" value="" type="text"/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Mã nhân viên:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="chung_thu_so" value="" type="text"/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Quyền:</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control level" name="level_id">
										@if($levels)
											@foreach($levels as $level)
												<option value="{{$level->id}}">{{$level->name}}</option>
											@endforeach
										@endif
                                    </select>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Trạng thái:</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control level" name="status">
                                        <option value="1">Hoạt động</option>
										<option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Mật khẩu:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="password" type="password"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Nhập lại mật khẩu:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="password_confirmation" type="password"/>
                            </div>
                        </div>
                        <div class="row">
                            <div id="error"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
								<button class="btn btn-primary" type="submit">Lưu</button>
                                <a style="padding: 8px 12px;border-radius:3px;background:#367fa9;color:#fff" href="{{route('admin.user.index')}}" title="" style="color: #fff;">Hủy</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
