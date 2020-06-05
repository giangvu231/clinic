<div id="wrapper">
    <header id="header"></header>
    <!--#header-->
    <style>
        .select {
            float: left;
            padding: 5px 20px 5px 20px !important;
        }
        .filter__input__item btn-primary button
        {
          
        }
        .test__wrap--header
        {
          --webkit-box-shadow: none;
          box-shadow: none;
        }
        .test__wrap--header .number-cart
        {
          padding-top: 10px;
          padding-bottom: 10px;
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
                          <div class="filter__input">
                            <div class="filter__input__item btn-primary">
                              <label for="">Mã bệnh nhân:</label>
                              <input type="text" placeholder="Nhập mã bệnh nhân" class="input_data" name="patient_id" value="{{request()->patient_id}}">
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Tên bệnh nhân:</label>
                              <input type="text" placeholder="Nhập tên bệnh nhân" class="input_data" name="patient_name" value="{{request()->patient_name}}">
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Mã chỉ định: </label>
                              <input type="text" name="access_id" placeholder="Nhập mã chỉ định" class="input_data" value="{{request()->access_id}}">
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Miêu tả: </label>
                              <input type="text" name="mota" placeholder="Nhập miêu tả" class="input_data" value="{{request()->mota}}">
                            </div>
                            <div class="filter__input__item btn-primary button_control">
                              <label for="">Search </label>
                              <a href="#">
                                <button type="submit">
                                  <i class="fas fa-search"></i>
                                  Search
                                </button>
                              </a>
                            </div>
                            <div class="filter__input__item btn-primary button_control">
                              <label for="">Today </label>
                              <a href="javascript:void(0)">
                                <button type="" onclick="toDay(event)" name="today">
                                  <i class="fas fa-calendar" aria-hidden="true"></i>
                                  Today
                                </button>
                              </a>
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Từ ngày:</label>
                              <input type="text" name="date_from" id="from" class="datepicker input_data" placeholder="yyyy-mm-dd" value="{{request()->date_from}}"/>
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Đến ngày:</label>
                              <input type="text" name="date_to" id="to" class="input_data" placeholder="yyyy-mm-dd" value="{{request()->date_to}}"/>
                            </div>
                            <div class="filter__input__item btn-primary">
                              <label for="">Tên bác sĩ: </label>
                              <input type="text" name="doctor_name" class="input_data" placeholder="Nhập tên bác sĩ"  value="{{request()->doctor_name}}">
                            </div>
                            <div class="filter__input__item btn-primary select-item">
                              <label for="">Tên dịch vụ: </label>
                              <select id="select-beast" class="input_data" class="demo-default" placeholder="Tên mẫu...." name="ten_thiet_bi">
                                @if(isset($loai_thiet_bi))
                                  @foreach($loai_thiet_bi as $loai)
                                    <option value="{{$loai->loai_thiet_bi}}" {{ (request()->ten_thiet_bi == $loai->loai_thiet_bi) ? 'selected' : "" }}>{{$loai->loai_thiet_bi}}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="filter__input__item btn-primary button_control">
                              <label for="">Search </label>
                              <a href="#">
                                <button type="button">
                                  <i class="fas fa-times"></i>
                                  Clear
                                </button>
                              </a>
                            </div>
                            <div class="filter__input__item btn-primary button_control">
                              <label for="">Today </label>
                              <a href="javascript:void(0)">
                                <button type="" onclick="last7Days(event)" name="last_day">
                                  Last 7 days
                                </button>
                              </a>
                            </div>
                          </div>
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
@yield('header')
