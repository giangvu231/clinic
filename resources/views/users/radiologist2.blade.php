@extends('layouts.app')
@section('title','Bác sĩ chuẩn đoán')
@section('css')
<style>
    body
    {
        background-color: #eff2f5;
        font-size: 14px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
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
    .t_head
    {
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .navtabs
    {
        margin-top: 30px;
    }
    .navtabs a
    {
        color: #000;
        text-transform: uppercase;
        font-weight: 500;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link 
    {
        color: #fff;
        background-color: #00BD9C;
    }
    table tr th
    {
        text-align: center;
        font-size: 14px;
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover 
    {
        background-color: #00BD9C;
        border-color: #00BD9C;
    }
    .pagination>li>a, .pagination>li>span 
    {
      color: #00BD9C;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover 
    {
    color: #fff;
    background-color: #00BD9C;
    }
    .order-tab th
    {
        text-align: center;
    }
    .order-tab input
    {
        width: 90%;
    }
    .order-tab tr
    {
        height: 59px;
    }
    .order-tab span
    {
        color: red;
        font-weight: bold;
    }
    .order-tab input.button-submit, input.button-reset
    {
        width: 150px;
        height: 36px;
        border-radius: 5px;
        background-color: #00BD9C;
        color: #fff;
        font-weight: bold;
        border: 1px solid #00BD9C;
    }
    .order-tab input.button-reset
    {
        background-color: #2f4358;
        border: 1px solid #2f4358;
    }
    .order-tab table
    {
        border-spacing: 5px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row navtabs">
        <ul class="nav nav-pills nav-justified w-100">
            <li class="nav-item">
                <a href="#order" class="nav-link" data-toggle="tab">Order</a>
            </li>
            <?php $tab = DB::table("statuses")->get() ?>
            @foreach($tab as $rows)
            <li class="nav-item">
                <a href="#{{ $rows->id }}" class="nav-link" data-toggle="tab">{{ $rows->name }}</a>
            </li>
            @endforeach
            <li class="nav-item active">
                <a href="#all" class="nav-link" data-toggle="tab">Exams</a>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row t_head ">
        <div class="tab-content w-100">

            <div class="tab-pane active in" id="all">
                <table width="100%" border="0" style="vertical-align: middle; text-align: center; border-collapse: collapse;">
                    <tr class="header">
                        <th style="padding-left: 10px;">
                            <div>STT</div>
                        </th>
                        <th>
                            <div>Tên bệnh nhân</div>
                        </th>
                        <th>
                            <div>Mã bệnh nhân</div>
                        </th>
                        {{-- <th>
                            <div>Mã tờ chỉ định</div>
                        </th> --}}
                        <th>
                            <div>Thời gian khởi tạo</div>
                        </th>
                        <th>
                            <div>Mã chỉ định</div>
                        </th>
                        <th>
                            <div>Tên dịch vụ</div>
                        </th>
                        <th>
                            <div>Trạng thái</div>
                        </th>
                        {{-- <th>
                            <div>Chuyển đến bởi</div>
                        </th> --}}
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $i = 1 ?>
                    @foreach ($medical_bills as $medical_bill)
                    <tr class="main">
                        <td style="padding-left: 10px;">
                            <div>{{ $i++ }}</div>
                        </td>
                        <td style="text-transform: uppercase;">
                            <div name="patient_name">{{ $medical_bill->first_name }} {{ $medical_bill->last_name }}</div>
                        </td>
                        <td>
                            <div name="patient_id">{{ $medical_bill->patient_id }}</div>
                        </td>
                        {{-- <td>
                            <div name="order_id">{{ $medical_bill->order_number }}</div>
                        </td> --}}
                        <td>
                            <span name="request_time">{{ $medical_bill->schedule_time }}</span>
                            <span name="request_date">{{ $medical_bill->schedule_date }}</span>
                        </td>
                        <td>
                            <div name="access_id">{{ $medical_bill->accession_number }}</div>
                        </td>
                        <td>
                            <div name="device_name">{{ $medical_bill->loai_thiet_bi }}</div>
                        </td>
                        <td style="text-transform: uppercase;">
                            <div name="status_id">
                                {{ isset($medical_bill->status->name) ? $medical_bill->status->name : "" }}
                            </div>
                        </td>
                        {{-- <td>
                            <div name="doctor_name">{{ $medical_bill->ordering_doctor_name }}</div>
                        </td> --}}
                        <td style="padding: 5px;">     
                            @if ($medical_bill->is_edited && $medical_bill->study_status == "3")
                            <i class="fas fa-pen" data-placement="bottom" data-toggle="tooltip" href="" title="Đã được chỉnh sửa"></i>
                            @endif
                            @if($medical_bill->study_status == "4")
                            <i class="far fa-check-square" data-placement="bottom" data-toggle="tooltip" href="" title="Hoàn tất"></i>
                            @endif
                        </td>
                        <td style="padding: 5px;">
                            <div class="float-right tooltip-right">
                                @if($medical_bill->study_status == "4" || $medical_bill->study_status == "3")
                                {{-- <a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="float-left" style="color: #2f4358;" onclick="openNewWindow('{{ $url2 . $medical_bill->accession_number }}')" href="{{ route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number]) }}"><i class="fas fa-notes-medical"></i></a> --}}
                                <a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="float-left" style="color: #2f4358;" href="{{ route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number]) }}"><i class="fas fa-notes-medical"></i></a>
                                @else
                                <a data-placement="bottom" data-toggle="tooltip" title="Chuyển tiếp" class="float-left" style="color: #2f4358;" href="{{ route('get.radiologist.update_status', $medical_bill->id) }}"><i class="fas fa-arrow-alt-circle-right"></i></a>         
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach       
                </table>
                <div class="fright">
                    @if (isset($medical_bills))
                    {{ $medical_bills->links() }}
                    @endif 
                </div>
            </div>

            <div class="tab-pane order-tab" id="order">
                <form style="width: 100%" action="{{ route('post.order.store') }}" method="POST">
                    {{ csrf_field() }}
                    <table border="0" width="100%">
                        <tr>
                            <th colspan="2" width="50%" style="font-size: 16px;">Thông tin bệnh nhân</th>
                            <th colspan="2" width="50%" style="font-size: 16px;">Thông tin chỉ định</th>
                        </tr>
                        <tr>
                            <td>Mã bệnh nhân <span>*</span></td>
                            <td><input type="number" name="patient_id" class="form-control" autocomplete="off" required></td>
                            <td>Dịch vụ <span>*</span></td>
                            <td>
                                <select style="padding: 5px;" name="loai_thiet_bi">
                                    <option value="CHỤP CẮT LỚP VI TÍNH">CT</option>
                                    <option value="NỘI SOI">Nội soi</option>
                                    <option value="CHỤP X - QUANG">X - quang</option>
                                    <option value="CHỤP CỘNG HƯỞNG TỪ">Cộng hưởng từ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Họ <span>*</span></td>
                            <td><input type="text" name="first_name" class="form-control" autocomplete="off" placeholder="VD: Nguyễn" required></td>
                            <td>Kỹ thuật <span>*</span></td>
                            <td><input type="text" name="ky_thuat" class="form-control" autocomplete="off" placeholder="VD: Chụp X - quang cột sống" required></td>
                        </tr>
                        <tr>
                            <td>Tên <span>*</span></td>
                            <td><input type="text" name="last_name" class="form-control" autocomplete="off" placeholder="VD: Văn A" required></td>
                            <td>Mã chỉ định <span>*</span></td>
                            <td><input type="number" name="accession_number" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh <span>*</span></td>
                            <td><input type="date" name="birth_date" autocomplete="off" class="form-control"></td>
                        {{-- <td>Mã tờ chỉ định</td>
                            <td><input type="number" name="exam_code" class="form-control" autocomplete="off" value="order-number"></td> --}}
                        </tr>
                        <tr>
                            <td>Giới tính <span>*</span></td>
                            <td>
                                <select style="padding: 5px;" name="sex">
                                    <option value="M">Nam</option>
                                    <option value="F">Nữ</option>
                                </select>
                            </td>
                            <td>Lý do</td>
                            <td><input type="text" name="reason" autocomplete="off" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Mang thai</td>
                            <td>
                                <select style="padding: 5px;" name="pregnant">
                                    <option value="Y">Có</option>
                                    <option value="N">Không</option>
                                </select>
                            </td>
                            <td>Tên chỉ định <span>*</span></td>
                            <td><input type="text" name="exam_name" class="form-control" autocomplete="off" placeholder="Chụp Xquang cột sống ngực thẳng nghiêng..."></td>
                        </tr>
                        <tr>
                            <td>Khoa</td>
                            <td><input type="" name="ordering_dept" class="form-control" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Phòng</td>
                            <td><input type="" name="exam_room" class="form-control" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right;"><input type="reset" name="" value="Xóa" class="button-reset"></td>
                            <td style="text-align: left;"><input type="submit" name="" value="Nhập" class="button-submit"></td>     
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>

            @foreach($tab as $rows)
            <div class="tab-pane @if($rows->id == 1)fade in @endif" id="{{$rows->id}}">
                <table width="100%" style="vertical-align: middle; text-align: center; border-spacing: 0; border-collapse: collapse;">
                    <tr class="header">
                        <th style="padding-left: 10px;">
                            <div>STT</div>
                        </th>
                        <th>
                            <div>Tên bệnh nhân</div>
                        </th>
                        <th>
                            <div>Mã bệnh nhân</div>
                        </th>
                    {{-- <th>
                        <div>Mã tờ chỉ định</div>
                    </th> --}}
                    <th>
                        <div>Thời gian khởi tạo</div>
                    </th>
                    <th>
                        <div>Mã chỉ định</div>
                    </th>
                    <th>
                        <div>Tên dịch vụ</div>
                    </th>
                    <th>
                        <div>Trạng thái</div>
                    </th>
                    {{-- <th>
                        <div>Chuyển đến bởi</div>
                    </th> --}}
                    <th></th>
                    <th></th>
                </tr>
                <?php $j = 1 ?>
                <?php $info = DB::table("medical_bills")->where("study_status","=",$rows->id)->get() ?>
                @foreach ($info as $medical_bill)
                {{-- @if($medical_bill->schedule_date == date('Y-m-d')) --}}
                @if($j <= 50)
                <tr class="main">
                    <td style="padding-left: 10px;">
                        <div>{{ $j++ }}</div>
                    </td>
                    <td style="text-transform: uppercase;">
                        <div name="patient_name">{{ $medical_bill->first_name }} {{ $medical_bill->last_name }}</div>
                    </td>
                    <td>
                        <div name="patient_id">{{ $medical_bill->patient_id }}</div>
                    </td>
                    {{-- <td>
                        <div name="order_id">{{ $medical_bill->order_number }}</div>
                    </td> --}}
                    <td>
                        <span name="request_date">{{ $medical_bill->schedule_date }}</span>
                        <span name="request_time">{{ $medical_bill->schedule_time }}</span>
                    </td>
                    <td>
                        <div name="access_id">{{ $medical_bill->accession_number }}</div>
                    </td>
                    <td>
                        <div name="device_name">{{ $medical_bill->loai_thiet_bi }}</div>
                    </td>
                    <td style="text-transform: uppercase;">
                        <div name="status_id">
                            {{ isset($medical_bill->status->name) ? $medical_bill->status->name : "" }}
                            {{ $rows->name }}
                        </div>
                    </td>
                    {{-- <td>
                        <div name="doctor_name">{{ $medical_bill->ordering_doctor_name }}</div>
                    </td> --}}
                    <td style="padding: 5px;">
                        @if ($medical_bill->is_edited && $medical_bill->study_status == "3")
                        <i class="fas fa-pen" data-placement="bottom" data-toggle="tooltip" href="" title="Đã được chỉnh sửa"></i>
                        @endif
                        @if($medical_bill->study_status == "4")
                        <i class="far fa-check-square"></i>
                        @endif
                    </td>
                    <td style="padding: 5px;">
                        <div class="float-right tooltip-right">
                          @if($medical_bill->study_status == "4" || $medical_bill->study_status == "3")
                          {{-- <a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="float-left" style="color: #2f4358;" onclick="openNewWindow('{{ $url2 . $medical_bill->accession_number }}')" href="{{ route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number]) }}"><i class="fas fa-notes-medical"></i></a> --}}
                          <a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="float-left" style="color: #2f4358;" href="{{ route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number]) }}"><i class="fas fa-notes-medical"></i></a>
                          @else
                          <a data-placement="bottom" data-toggle="tooltip" title="Chuyển tiếp" class="float-left" style="color: #2f4358;" href="{{ route('get.radiologist.update_status', $medical_bill->id) }}"><i class="fas fa-arrow-alt-circle-right"></i></a>
                          @endif
                      </div>
                  </td>
              </tr>
              @endif
              @endforeach       
          </table>
          {{-- <div class="fright">
            {{ $medical_bills_1->links() }}
        </div> --}}
    </div>
    @endforeach
</div>
</div>
</div>
</div>
</section>
@endsection
@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('select/js/jqueryui.js')}}"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript" src="{{asset('select/js/index.js')}}"></script>
<script type="text/javascript" src="{{asset('select/js/es5.js')}}"></script>
<!-- jQuery library -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
<script>
    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    function last7Days(e){
        var today = new Date();
        var lastDay = today.addDays(-7);
        $("#to").val(formatDate(today));
        $("#from").val(formatDate(lastDay));
        e.preventDefault();
    }
    function toDay(e){
        var today = new Date();
        $("#to").val(formatDate(today));
        $("#from").val(formatDate(today));
        e.preventDefault();
    }
    function formatDate(date) {
        var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
    $('#to').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#from').datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>
<!-- Latest compiled JavaScript -->
<script type="text/javascript">
  $('#select-beast').selectize({
    create: true,
    sortField: {
      field: 'text',
      direction: 'asc'
  },
  dropdownParent: 'body'
});
  $('#select-beast1').selectize({
    create: true,
    sortField: {
      field: 'text',
      direction: 'asc'
  },
  dropdownParent: 'body'
});

    //   setInterval(function(){ window.location.reload(); }, 5000);
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    function openNewWindow(url) {
        var params = [
        'height=' + screen.height,
        'width=' + screen.width,
        'scrollbars=yes',
        'status=yes',
        'location=yes'
        ].join(',');
        var popup = window.open(url, 'popup_window', params); 
        popup.moveTo(0,0);
    }
</script>
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/js/popper.min.js') }}"></script>
@endsection