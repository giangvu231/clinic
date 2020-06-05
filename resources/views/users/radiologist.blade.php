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
</style>
@endsection
@section('content')
<div class="container">
    <div class="row" style="text-align: center;">
        <h5>Xin chào mừng tới với hệ thống quản lý phòng khám </h5>
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