<div id="wrapper">
    <header id="header"></header>
    <!--#header-->
    <style>
        .select {
            float: left;
            padding: 5px 20px 5px 20px !important;
        }
    </style>
    <section class="test" id="test">
        <div class="container">
            <div class="test__wrap">
                <div class="test__wrap--header">
                    <div class="topbar">
                        <div class="time fleft">
                            <div class="tooltip-btn fleft">
                                    <a class="fleft" href="<?php echo e(route('get.radiologist')); ?>" data-placement="bottom" data-toggle="tooltip" title="Trang chủ"><i class="fas fa-home"> </i></a>
                            </div>
                            <span class="fleft">Today, <?php echo e(date('d-m-Y')); ?></span>
                            <p class="td fleft"></p>
                            <div class="clear-fix"></div>
                        </div>
                        <?php if(Auth::check()): ?>
                            <div class="welcome fright">
                                <p>Xin chào
                                    <span><?php echo e(Auth::user()->hoten); ?></span>
                                </p>
                                <div class="popup">
                                    <ul>
                                        <li>
                                            <a href="<?php echo e(route('get.changepassword.view')); ?>">Đổi mật khẩu</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('get.logout')); ?>">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>        
                        <div class="clear-fix"></div>
                    </div>
                    <div class="number-cart">
                      
                        <div class="filter-wrap">
                          <form action="" method="get">
                            <?php echo e(csrf_field()); ?>

                          <div class="filter__input">
                            <div class="filter__input__item">
                              <label for="">Mã bệnh nhân:</label>
                              <input type="text" placeholder="Nhập mã bệnh nhân" name="patient_id" value="<?php echo e(request()->patient_id); ?>">
                            </div>
                            <div class="filter__input__item">
                              <label for="">Loại thiết bị:</label>
                              <select id="select-beast1" class="demo-default" placeholder="Loại thiết bị...." name="loai_thiet_bi">
                                  <option value="" selected>Chọn loại thiết bị</option>
                                <?php if(isset($loai_thiet_bi)): ?>
                                  <?php $__currentLoopData = $loai_thiet_bi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ltb->loai_thiet_bi); ?>" <?php echo e((request()->loai_thiet_bi == $ltb->loai_thiet_bi) ? 'selected' : ""); ?>><?php echo e($ltb->loai_thiet_bi); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <div class="filter__input__item">
                              <label for="">Tên mẫu: </label>
                              <select id="select-beast" class="demo-default" placeholder="Tên mẫu...." name="ten_mau">
                                  <option value="" selected>Chọn tên mẫu</option>
                                <?php if(isset($templates)): ?>
                                  <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
                                    <option value="<?php echo e($template->template_id); ?>" <?php echo e((request()->ten_mau == $template->template_id) ? 'selected' : ""); ?>><?php echo e($template->ten_mau); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            
                          </div>
                          <div class="filter__search"><a href="#"><button type="submit" style="background: none; width: 100%; height: 100%;
                          border:none;"><i class="fas fa-search"></i>Tìm kiếm</button></a></div>
                          </form>
                        </div>
                        <div class="form-filter">
                            <form action="">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="col-6-box">
                                    <div class="input-filter">
                                      <label>Tên bệnh nhân</label>
                                      <input type="text" name="patient_id" value="<?php echo e(request()->patient_id); ?>">
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
                                        <input type="text" name="order_id" value="<?php echo e(request()->order_id); ?>">
                                      <div class="clear-fix"></div>
                                    </div>
                                    <div class="input-filter">
                                      <label>Mã chỉ định</label>
                                        <input type="text" name="access_id" value="<?php echo e(request()->access_id); ?>">
                                      <div class="clear-fix"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="col-6-box">
                                    <div class="input-filter">
                                      <label>Mã bệnh nhân</label>
                                      <input type="text" name="patient_name" value="<?php echo e(request()->patient_name); ?>">
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
                                        <input type="text" name="doctor_name" value="<?php echo e(request()->doctor_name); ?>">
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
    
<?php echo $__env->yieldContent('header'); ?>
