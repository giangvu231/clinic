@extends('admin.layouts.app')
@section('title','Thiết lập URL2')
@section('content')
    <div class="content-wrapper">
        <div class="edit-template">
            <div class="topbar topbar-wrap">
                <div class="top-title fleft">
                    <h2>Thiết lập URL2</h2>
                </div>
                <div class="top-menu fright">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                        <li><a href="{{route('admin.index')}}">Quản trị</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="#">Thiết lập URL2</a></li>
                    </ul>
                </div>
                <div class="clear-fix"></div>
            </div>
            <div class="account-permiss__content">
                <p style="text-align: center;color:blue;font-size: 20px;margin:0px;padding:5px;font-weight: 700">{{session()->has('message') ? session()->get('message'): ""}}</p>
                <form action="{{ route('admin.settings.url2.update', [ 'id' => 0 ]) }}" method="POST" id="update-form">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="edit-input">
                            <label>Đường dẫn</label>
                            <input class="form-control" style="width: 70%" type="text" name="url2" required value="{{ $url2 }}"/>
                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    @include('common.errors')
                    {{Session::forget('errors')}}   
                    <div class="account-permiss__btn">
                        <div class="save-btn">
                            <button type="reset"><a href="{{route('admin.settings.url2.index')}}">Hủy</a></button>
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
    </script>
@endpush