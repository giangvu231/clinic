<div id="wrapper">
  <header id="header"></header>
  <style type="text/css">
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
    div.row.menu
    {
      max-height: 56px;
      line-height: 56px;
    }
    .menu-wrapper .container
    {
      max-height: 56px;
      line-height: 56px;
    }
</style>
<?php $chucvu = DB::table("levels")->where("id","=",Auth::user()->level_id)->first() ?>
<div class="menu-wrapper btn-primary">
  <div class="container">
    <div class="row menu">
      <div class="col-lg-2 logo">
        <a href="{{ route('get.exams.view') }}" style="float: left; margin-right: 20px;">Trang chủ</a>
      </div>
      <ul class="nav-links col-lg-7" style="float: left;">
        <li><a href="{{ route('get.exams.view') }}">Tiếp nhận</a></li>
        <!-- <li><a href="{{ route('get.order.view') }}">Tiếp nhận</a></li> -->
       <!--  <li><a href="{{ route('get.schedule.view') }}">Schedule</a></li>
        <li><a href="{{ route('get.worklist.view') }}">Worklist</a></li> -->
        @if (Auth::user()->level_id == 4 || Auth::user()->level_id == 1)
        <li><a href="{{ route('get.reporting.view') }}">Khám</a></li>
        @endif
        <li><a href="{{ route('get.finalize.view') }}">Hoàn thành</a></li>
        @if (Auth::user()->level_id == 1)
        <li><a href="{{ route('admin.index') }}">Quản lý</a></li>
        @endif
        
      </ul>
      @if (Auth::check())
      <div class="welcome fright col-lg-3">
        <span>{{ Auth::user()->hoten }}</span> - <span>{{ $chucvu->name }}</span>
        &nbsp;&nbsp;
        <a data-placement="bottom" data-toggle="tooltip" title="Đăng xuất" href="{{route('get.logout')}}"><i class="fas fa-sign-out-alt"></i></a>
      </div>
      @endif
    </div>
  </div>
</div>
@yield('header')
