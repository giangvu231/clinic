@extends('layouts.app')
@section('title','Bác sĩ chuẩn đoán')
@section('css')
<style>
    select::-ms-expand{
        display:none;
    }
    select::after{
        content:'\f107';
        font-family:"Font Awesome 5 Brands";
    }
    .select-item select {
        -moz-appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
    .select-item{
        position:relative
    }
    .select-item::after {
    content:"\f107";
    font-family:"Font Awesome 5 Free";
    font-weight:700;
    display:block;
    position:absolute;
    top: 52%;
    right: 23px;
    }
    .test__wrap--header
    {
        box-shadow: none;
    }
    .test__wrap--content .table2
    {
        box-shadow: none;
    }
    tr.shadow.bg
    {
        border-bottom: 1px solid gray;
    }
    .test__wrap--content .table1 tr
    {
    }
</style>
@endsection
@section('content')
    <div class="test__wrap--content">
        <table class="table1">
            <thead>
            <tr>
                <th>
                    <p>Tên bệnh nhân</p>
                </th>
                <th>
                    <p>Mã bệnh nhân</p>
                </th>
                <th>
                    <p>Mã tờ chỉ định</p>
                </th>
                <th>
                    <p>Ngày khởi tạo</p>
                </th>
                <th>
                    <p>Thời gian khởi tạo</p>
                </th>
                <th>
                    <p>Mã chỉ định</p>
                </th>
                <th>
                    <p>Tên dịch vụ</p>
                </th>
                <th>
                    <p>Trạng thái</p>
                </th>
                <th>
                    <p>Chuyển đến bởi</p>
                </th>
                <th></th>
            </tr>
            </thead>
        </table>
        <table class="table2">
            <tbody class="content--table" id="list_data" style="border-radius: 12px;">
                @foreach ($medical_bills as $medical_bill)
                
                <tr class="shadow bg">
                    <td>
                        <p name="patient_name">{{ $medical_bill->first_name }} {{ $medical_bill->last_name }}</p>
                    </td>
                    <td>
                        <p name="patient_id">{{ $medical_bill->patient_id }}</p>
                    </td>
                    <td>
                        <p name="order_id">{{ $medical_bill->order_number }}</p>
                    </td>
                    <td>
                        <p name="request_date">{{ $medical_bill->schedule_date }}</p>
                    </td>
                    <td>
                        <p name="request_time">{{ $medical_bill->schedule_time }}</p>
                    </td>
                    <td>
                        <p name="access_id">{{ $medical_bill->accession_number }}</p>
                    </td>
                    <td>
                        <p name="device_name">{{ $medical_bill->loai_thiet_bi }}</p>
                    </td>
                    <td>
                        <p name="status_id">
                            {{ isset($medical_bill->status->name) ? $medical_bill->status->name : "" }}
                        </p>
                    </td>
                    <td>
                        <p name="doctor_name">{{ $medical_bill->ordering_doctor_name }}</p>
                    </td>
                <td style="padding-right: 15px;">
                        <p>
                            <div class="fright mr-r-10 tooltip-btn">
                                <a data-placement="bottom" data-toggle="tooltip" 
                                title="Xem chỉ định" 
                                class="btn-next fleft" 
                                onclick="openNewWindow('{{ $url2 . $medical_bill->accession_number }}')" 
                                href="{{ route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number]) }}">
                                    <i class="fas fa-forward"></i>
                                </a>
                            </div>
                            @if ($medical_bill->is_edited)
                            <i class="fas fa-pen"></i>
                            @endif
                        <div class="clear-fix"></div>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
		<br/>
        <div class="fright">
            @if (isset($medical_bills))
            {{ $medical_bills->links() }}
            @endif
        </div>
        <div class="clearfix"></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
@endsection