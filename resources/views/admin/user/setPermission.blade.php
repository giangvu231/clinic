@extends('admin.layouts.app')
@section('title','Admin User')
@section('css')
    .user.active {
        background: highlight;
    }
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="account-permiss">
            <div class="topbar topbar-wrap">
                <div class="top-title fleft">
                    <h2>Phân quyền người dùng</h2>
                </div>
                <div class="top-menu fright">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                        <li><a href="{{route('admin.index')}}">Quản trị</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="{{route('admin.user.permission')}}">Phân quyền người dùng</a></li>
                    </ul>
                </div>
                <div class="clear-fix"></div>
            </div>
            <!--.topbar-wrap-->
            <div class="account-permiss__content">
                <div class="account-permiss__search">
                    <h3>Tìm tài khoản</h3>
                    <div class="form-search">
						<form action="">
                            <div class="form-group">
                                <input class="form-control fleft" name="name" value="{{request()->name}}" placeholder="Tìm theo tên"/>
                                <select class="form-control fleft" name="level_id">
                                    <option class="disable" value="">Quyền hạn</option>
                                    @foreach ($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                                <input class="fleft" type="submit" value="Tìm kiếm"/>
                                <div class="clear-fix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end account-search-->
                <div class="account-permiss__title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Danh sách tài khoản</h3>
                        </div>
                        <div class="col-sm-4">
                            <h3>Các trạng thái chỉ định</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form action="{{route('admin.change.permission')}}" method="POST" id="change-permission-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="account-permiss__list">
                            <div class="col-sm-8">
                                <div class="table1">
                                    <table>
                                        <tr>
                                            <td>#</td>
                                            <td>Tên tài khoản</td>
                                            <td>Tên người dùng</td>
                                            <td>Quyền hạn</td>
                                        </tr>

                                        @foreach ($users as $key => $user)
                                            <tr class="user user{{$user->id}} {{$key == 0 ? "active" : ""}}" onclick="userClick(this,{{$user->id}})">
                                                <td>{{(($users->currentPage() - 1 ) * $users->perPage()) + ($key+1)}}</td>
                                                <td>{{$user->userid}}</td>
                                                <td>{{$user->hoten}}</td>
												<td>{{$user->level->name}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                <div class="pull-left" style="float:right!important;">
                                                {{$users->appends([
                                                    'name' => request()->name,
													'level_id' => request()->level_id
                                                ])->links('vendor.pagination.admin_user')}}</div>
                                                <div class="clearfix"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @foreach ($users as $key => $user)
                                <div class="col-sm-4 permission permission{{$user->id}}" style="display:{{$key == 0 ? "" : "none"}}">
                                    <div class="row">
                                        @if(!$user->isAdmin())
                                            @foreach (getUserStt($user) as $stt)
                                                @if($stt["is_checked"])
                                                    <div class="form-check">
                                                        <div class="form-check__item">
                                                            <input type="checkbox" name="status_id[{{$user->id}}][]" value="{{$stt["id"]}}" checked/>
                                                            <label for="datlich">
                                                                {{$stt["name"]}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <div class="form-check__item">
                                                            <input type="checkbox" name="status_id[{{$user->id}}][]" value="{{$stt["id"]}}"/>
                                                            <label for="datlich">
                                                                {{$stt["name"]}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="account-permiss__btn">
                            <div class="save-btn"><button type="submit">Lưu</button></div>
                            <div class="cancel-btn"><button type="reset">Hủy</button></div>
                        </div>
                    </form>
                </div>
                <!--end account-list-->
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function userClick(self,id){
            $(".active").removeClass("active");
            $(".user"+id).addClass("active");
            $(".permission").hide();
            $(".permission"+id).show();
        }
    </script>
@endpush