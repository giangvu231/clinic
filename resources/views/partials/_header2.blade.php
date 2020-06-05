<div id="wrapper">
    <header id="header"></header>
    <!--#header-->
    <style>
        .select {
            float: left;
            padding: 5px 20px 5px 20px !important;
        }
        .filter__input__item button
        {
          background: #00BD9C;
        }
        .test__wrap--header
        {
          --webkit-box-shadow: none;
          box-shadow: none;
        }
        .test__wrap--header .number-cart
        {
          padding-top: 10px;
          padding-bottom: 20px;
        }
        table tr td a
        {
          color: #fff;
        }
        table tr td a:hover
        {
          color: #fff;
        }
        table tr td a button
        {
          height: 39px;
          width: 95%;
          background-color: #00BD9C;
          border: none;
          border-radius: 5px;
        }
        table tr td select.input_data
        {
          height: 39px;
          width: 95%;
          background-color: #f5f5f5;
          border-radius: 5px;
          border: none;
          padding: 5px;
        }
        table tr td label
        {
          font-weight: 400;
          margin-top: 5px;
        }
        table
        {
          margin-bottom: 10px;
        }
    </style>
    <section class="test" id="test">
        <div class="container">
            <div class="test__wrap">
                <div class="test__wrap--header">
                    <div class="topbar">
                        <div class="time fleft">
                            <div class="tooltip-btn fleft">
                                    <a class="fleft" href="{{route('get.radiologist')}}" data-placement="bottom" data-toggle="tooltip" title="Trang chủ"><i class="fas fa-home" style="background-color: #00BD9C"> </i></a>
                            </div>
                            <span class="fleft">Today, {{ date('d/m/Y') }}</span>
                            <p class="td fleft"></p> 
                            <div class="clear-fix"></div>
                        </div>
                        @if (Auth::check())
                            <div class="welcome fright">
                                <p>Xin chào
                                    <?php $chucvu = DB::table("levels")->where("id","=",Auth::user()->level_id)->first() ?>
                                    <span>{{ Auth::user()->hoten }},</span>
                                    Chức vụ
                                    <span>{{ $chucvu->name }}</span>
                                </p>
                                <div class="popup">
                                    <ul>
                                        {{-- <li>
                                            <a href="{{route('get.changepassword.view')}}">Đổi mật khẩu</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{route('get.logout')}}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif        
                        <div class="clear-fix"></div>
                    </div>
                    <div class="number-cart">
                      
                        <div class="filter-wrap">
                          <form action="" method="get">
                            {{ csrf_field() }}
                            <table border="0" width="100%">
                              <tr>
                                <td width="16.6%">
                                  <label>Mã bệnh nhân:</label>
                                  <input type="text" placeholder="Nhập mã bệnh nhân" class="input_data" name="patient_id" value="{{request()->patient_id}}" style="width: 95%;">
                                </td>
                                <td width="16.6%">
                                  <label>Tên bệnh nhân:</label>
                                  <input type="text" placeholder="Nhập tên bệnh nhân" class="input_data" name="patient_name" value="{{request()->patient_name}}"  style="width: 95%;">
                                </td>
                                <td width="16.6%">
                                  <label>Mã chỉ định: </label>
                                  <input type="text" name="access_id" placeholder="Nhập mã chỉ định" class="input_data" value="{{request()->access_id}}"  style="width: 95%;">
                                </td>
                                <td width="16.6%">
                                  <label>Miêu tả: </label>
                                  <input type="text" name="mota" placeholder="Nhập miêu tả" class="input_data" value="{{request()->mota}}"  style="width: 95%;">
                                </td>
                                <td width="16.6%" style="text-align: center; vertical-align: bottom;">
                                  <a href="#">
                                    <button type="submit">
                                      <i class="fas fa-search"></i>
                                      Search
                                    </button>
                                  </a>
                                </td>
                                <td width="16.6%" style="text-align: center; vertical-align: bottom;">
                                  <a href="javascript:void(0)">
                                    <button type="" onclick="toDay(event)" name="today">
                                      <i class="fas fa-calendar" aria-hidden="true"></i>
                                      Today
                                    </button>
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label>Từ ngày:</label>
                                  <input  style="width: 95%;" type="date" name="date_from" id="from" class="datepicker input_data" placeholder="yyyy-mm-dd" value="{{request()->date_from}}"/>
                                </td>
                                <td>
                                  <label>Đến ngày:</label>
                                  <input  style="width: 95%;" type="date" name="date_to" id="to" class="input_data" placeholder="yyyy-mm-dd" value="{{request()->date_to}}"/>
                                </td>
                                <td>
                                  <label>Tên bác sĩ: </label>
                                  <input  style="width: 95%;" type="text" name="doctor_name" class="input_data" placeholder="Nhập tên bác sĩ"  value="{{request()->doctor_name}}">
                                </td>
                                <td>
                                  <label>Tên dịch vụ: </label>
                                  <select id="select-beast" class="input_data" class="demo-default" placeholder="Tên mẫu...." name="ten_thiet_bi">
                                    @if(isset($loai_thiet_bi))
                                    @foreach($loai_thiet_bi as $loai)
                                    <option value="{{$loai->loai_thiet_bi}}" {{ (request()->ten_thiet_bi == $loai->loai_thiet_bi) ? 'selected' : "" }}>{{$loai->loai_thiet_bi}}</option>
                                    @endforeach
                                    @endif
                                  </select>
                                </td>
                                <td style="text-align: center; vertical-align: bottom;">
                                  <a href="#">
                                    <button type="button">
                                      <i class="fas fa-times"></i>
                                      Clear
                                    </button>
                                  </a>
                                </td>
                                <td style="text-align: center; vertical-align: bottom;">
                                  <a href="javascript:void(0)">
                                    <button type="" onclick="last7Days(event)" name="last_day">
                                      Last 7 days
                                    </button>
                                  </a>
                                </td>
                              </tr>
                            </table>
                          </form>
                        </div>
                        <div class="form-filter">
                            <form action="">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="col-6-box">
                                    <div class="input-filter">
                                      <label>Tên bệnh nhân</label>
                                      <input type="text" name="patient_id" value="{{request()->patient_id}}">
                                      <div class="clear-fix"></div>
                                    </div>
                                    <div class="input-filter">
                                        <label>Loại thiết bị</label>
                                        <select class="d-enter" name="">
                                            <option value="">Chọn thiết bị</option>
                                        </select>
                                    <div class="clear-fix"></div>
                                    </div>
                                    <div class="input-filter">
                                      <label>Mã tờ chỉ định</label>
                                        <input type="text" name="order_id" value="{{request()->order_id}}">
                                      <div class="clear-fix"></div>
                                    </div>
                                    <div class="input-filter">
                                      <label>Mã chỉ định</label>
                                        <input type="text" name="access_id" value="{{request()->access_id}}">
                                      <div class="clear-fix"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="col-6-box">
                                    <div class="input-filter">
                                      <label>Mã bệnh nhân</label>
                                      <input type="text" name="patient_name" value="{{request()->patient_name}}">
                                      <div class="clear-fix"> </div>
                                    </div>
                                    <div class="input-filter">
                                      <label>Thời gian bắt đầu</label>
                                      <input type="date" name="datefrom"/>
                                    </div>
                                    <div class="input-filter input-after">
                                      <label>Thời gian kết thúc</label>
                                      <input type="date" name="dateto"/>
                                    </div>
                                    <div class="input-filter">
                                        <label>Tên dịch vụ</label>
                                        <select class="d-enter" name="device_id">
                                            <option value="" selected="selected">Chọn dịch vụ</option>
                                        </select>
                                    <div class="clear-fix"></div>
                                    </div>
                                    <div class="input-filter">
                                      <label>Bác sĩ chuẩn đoán</label>
                                        <input type="text" name="doctor_name" value="{{request()->doctor_name}}">
                                      <div class="clear-fix"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="btn-filter">
                                    <button type="submit">Lọc</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        <div class="clear-fix"></div>
                    </div>
                </div>
                <div>
                  <a href="{{ route('get.schedule.view') }}">Click to go to schedule page</a>
                </div>
@yield('header')
