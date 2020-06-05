@extends('admin.layouts.app')
@section('title','Sửa template')
@section('content')
<div class="content-wrapper">
    <div class="edit-template">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Sửa template</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                    <li><a href="{{route('admin.index')}}">Quản trị</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="#">Sửa template</a></li>
                </ul>
            </div>
            <div class="clear-fix"></div>
        </div>
        <!--.topbar-wrap-->
        <div class="account-permiss__content">
            <form action="{{route('admin.template.update', ['id'=>$template->TuDienKetQua_Id])}}" method="POST" id="update-form">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="edit-input">
                        <label>Mã dịch vụ</label>
                        <input class="form-control" value="{{$template->MaSo}}" name="MaSo"/>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-input">
                        <label>Tên dịch vụ</label>
                        <input class="form-control" value="{{$template->TenNoiDung}}" name="TenNoiDung" style="float:left; width: 500px" />
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-input">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="KetQua_Text" id="summernote" cols="10" rows="10" style="float:left; width: 500px">{{$template->KetQua_Text}}</textarea>
                        <div class="clear-fix"></div>
                    </div>
                     <div class="edit-input">
                        <label>Kết Luận</label>
                        <input class="form-control" value="{{$template->KetLuan}}" name="KetLuan" style="float:left; width: 500px" />
                        <div class="clear-fix"></div>
                    </div>
                    <div class="edit-input">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option class="disable" value="">Trọn trạng thái</option>
                            <option value="1" {{$template->status == 1? "selected" : ""}}>Hoạt động</option>
                            <option value="0" {{$template->status == 0? "selected" : ""}}>Ẩn</option>
                        </select>
                        <div class="clear-fix"></div>
                    </div>
                </div>
                @include('common.errors')
                {{Session::forget('errors')}}   
                <div class="account-permiss__btn">
                    <div class="save-btn">
                        <button type="reset"><a href="{{route('admin.template.index')}}">Hủy</a></button>
                    </div>
                    <div class="cancel-btn">
                        <button type="submit">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#summernote').summernote({
        toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['picture']],
                ['fontsize', ['fontsize']],
                ],
                height: 500,                
                minHeight: 150,           
                maxHeight: 500,             
                focus: true,
                tabsize: 2,
                placeholder: 'Nơi viết mô tả'    
            });
        </script>
        @endpush