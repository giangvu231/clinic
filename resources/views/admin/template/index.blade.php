@extends('admin.layouts.app')
@section('title','Admin Template')
@section('content')
    <div class="content-wrapper">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Danh sách template</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
                <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="{{route('admin.index')}}">Quản trị</a></li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                <li><a href="#">Danh sách mẫu kê đơn</a></li>
                </ul>
            </div>
            <div class="clear-fix"></div>
        </div>
        <div class="list-account template-list">
            
            <div class="content-top">
                <form action="">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tìm kiếm mẫu </label>
                                <input class="form-control" name="name" type="text"
                                       placeholder="Tìm kiếm"/>
                            </div>
                        </div>
                     <!--    <div class="col-sm-3">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option selected="selected" value="" disabled>Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div> -->
                        <input type="hidden" name="page" value="{{$templates->currentPage()}}">
                        <div class="col-sm-2">
                            <button class="btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <p style="text-align: center;color:blue;font-size: 20px;margin:0px;padding:5px;font-weight: 700">{{session()->has('message') ? session()->get('message'): ""}}</p>
					<div class="col-sm-6 col-xs-6 text-left">
						<label>Chọn hiển thị:  </label>
                        <select name="limit" id="" onchange="location = this.value">
							<option selected value="">Lựa chọn</option>
                            <option value="{{route('admin.template.index', ['limit' => 10])}}">10</option>
                            <option value="{{route('admin.template.index', ['limit' => 20])}}">20</option>
                            <option value="{{route('admin.template.index', ['limit' => 50])}}">50</option>
                            <option value="{{route('admin.template.index', ['limit' => 100])}}">100</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6 text-right">
                        <p>Tổng số: {{ isset($templates) ? $templates->total() : ""}}</p>
                    </div>
                </div>
            </div>
            <div class="table-content">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Tên bệnh</th>
                            <th class="text-center">Mẫu</th>
                          <!--   <th class="text-center">Trạng thái</th> -->
                            <th class="text-center">Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($templates as $key => $template)
                            <tr>
                                <td>{{(($templates->currentPage() - 1 ) * $templates->perPage()) + ($key+1)}}</td>
                                <td>{{$template->TenNoiDung}}</td>
                                <td>{{ str_limit($template->KetQua_Text, 100) }}</td>
                               <!--  {-- @if ($template->status === 1)
                                    <td class="text-center">Hoạt động</td>
                                @else
                                    <td class="text-center">Ẩn</td>
                                @endif --} -->
                                <td class="edit text-center">
                                    <a href="{{route('admin.template.edit',$template->TuDienKetQua_Id)}}"><i class="fa fa-edit"></i></a>
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
                        {{$templates->appends([
                            'name' => request()->name,
                            'status' => request()->status,
							'limit' => request()->limit
                        ])->links('vendor.pagination.admin_user')}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush