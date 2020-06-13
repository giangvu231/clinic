<div id="wrapper">
  <header id="header"></header>
  <style type="text/css">
    body
    {
      font-size: 14px;
      font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
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
      line-height: 56px
    }
  </style>
  <?php $chucvu = DB::table("levels")->where("id","=",Auth::user()->level_id)->first() ?>
  <div class="menu-wrapper btn-primary">
    <div class="container">
      <div class="row menu btn-primary" style="line-height: 35px;">
        <div class="col-lg-2 logo">
          <a href="<?php echo e(route('get.exams.view')); ?>" style="float: left; margin-right: 20px;">Telemed Ris</a>
        </div>
        <ul class="nav-links col-lg-7 btn-primary" style="float: left;">
          <!-- <li><a href="<?php echo e(route('get.image.view', ['accession_number' => $medical_bill->accession_number])); ?>">Hình ảnh</a></li> -->
          <!-- <li><a href="<?php echo e(route('get.description.view', ['accession_number' => $medical_bill->accession_number])); ?>">Mô tả </a></li> -->
<!--           <li><a href="<?php echo e(route('get.patientinfo.view', ['accession_number' => $medical_bill->accession_number])); ?>">Chi tiết</a></li>
 -->         <!--  <li><a href="<?php echo e(route('addMore', ['accession_number' => $medical_bill->accession_number])); ?>">Kê đơn</a></li> -->
          <li><?php echo e($medical_bill->first_name); ?></li>
          <li><?php echo e($medical_bill->patient_id); ?></li>
          <li><?php echo e($medical_bill->accession_number); ?></li>
        </ul>
        <?php if(Auth::check()): ?>
        <div class="welcome fright col-lg-3">
          <span><?php echo e(Auth::user()->hoten); ?></span> - <span><?php echo e($chucvu->name); ?></span>
          &nbsp;&nbsp;
          <a data-placement="bottom" data-toggle="tooltip" title="Đăng xuất" href="<?php echo e(route('get.logout')); ?>"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <?php endif; ?>  
      </div>
    </div>
  </div>
  <?php echo $__env->yieldContent('header'); ?>
