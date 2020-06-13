<?php $__env->startSection('title','Bác sĩ chuẩn đoán'); ?>
<?php $__env->startSection('css'); ?>
<style>
    body
    {
        background-color: #eff2f5;
        font-size: 14px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row" style="text-align: center;">
        <h5>Xin chào mừng tới với hệ thống quản lý phòng khám </h5>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>
<script src="<?php echo e(asset('select/js/jqueryui.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript" src="<?php echo e(asset('select/js/index.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('select/js/es5.js')); ?>"></script>
<!-- jQuery library -->


<script type="text/javascript" src="<?php echo e(asset('dist/js/jquery-3.4.1.min.js')); ?>"></script>
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




<script type="text/javascript" src="<?php echo e(asset('dist/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dist/js/popper.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>