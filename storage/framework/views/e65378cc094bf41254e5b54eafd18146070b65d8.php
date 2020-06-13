<?php $__env->startSection('title','Admin statics'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Thống kê chỉ định</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
                <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="#">Quản trị</a></li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                <li><a href="#">Thống kê chỉ định</a></li>
                </ul>
            </div>
            <div class="clear-fix">  </div>
        </div>
        <div class="list-account Statistical">
            <div class="content-top">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tìm kiếm</label>
                                <input class="form-control" type="text" value="<?php echo e(request()->content); ?>" name="content"
                                       placeholder="Tìm kiếm"/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd-mm-yyyy">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input class="form-control" type="text" name="date_from"
                                               placeholder="Chọn ngày"/ autocomplete="off">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd-mm-yyyy">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input class="form-control" type="text" name="date_to"
                                               placeholder="Chọn ngày"/ autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <?php if(session('success')): ?>
                    <div class="col-sm-12 col-xs-12 text-center bg-success">
                        <h2 class="text-success"><?php echo e(session('success')); ?></h2>
                        <?php echo e(session()->forget('success')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6 text-left">
						<label>Chọn hiển thị:  </label>
                        <select name="limit" id="" onchange="location = this.value">
							<option selected value="">Lựa chọn</option>
                            <option value="<?php echo e(route('get.statics.index', ['limit' => 10])); ?>">10</option>
                            <option value="<?php echo e(route('get.statics.index', ['limit' => 20])); ?>">20</option>
                            <option value="<?php echo e(route('get.statics.index', ['limit' => 50])); ?>">50</option>
                            <option value="<?php echo e(route('get.statics.index', ['limit' => 100])); ?>">100</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6 text-right">
                        <p>Tổng: <?php echo e($medical_bills->total()); ?></p>
                    </div>
                </div>
            </div>
            <div class="table-content">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient ID</th>
                            <th>Patient NAme</th>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Accession Number</th>
                            <th>Exam Code</th>
                            <th>Study Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $medical_bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $medical_bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e((($medical_bills->currentPage() - 1 ) * $medical_bills->perPage()) + ($key+1)); ?></td>
                                <td><?php echo e($medical_bill->patient_id); ?></td>
                                <td><?php echo e($medical_bill->first_name); ?> <?php echo e($medical_bill->last_name); ?></td>
                                <td><?php echo e($medical_bill->order_number); ?></td>
                                <td><?php echo e($medical_bill->schedule_date); ?></td>
                                <td class="text-center"><?php echo e($medical_bill->schedule_time); ?></td>
                                <td><?php echo e($medical_bill->accession_number); ?></td>
                                <td>
                                    <?php echo e($medical_bill->exam_code); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($medical_bill->status->name) ? $medical_bill->status->name : ""); ?>

                                </td>
                                <td class="edit text-center">
                                    <button class="edit">Xem</button>
                                </td>
                            </tr>
                            <tr class="table-hide">
                                <td colspan="10">
                                    <div class="drop-menu-table Statistical__list">
                                        <div class="title">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h3>Xem chi tiết</h3>
                                                </div>
                                                <div class="col-md-3">
                                                    <h4>Tên:
                                                        <span><?php echo e($medical_bill->first_name); ?> <?php echo e($medical_bill->last_name); ?></span></h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4>Exam Name:
                                                        <span><?php echo e($medical_bill->exam_name); ?></span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content" style="min-height: 200px">
                                            <div class="row">
                                                <ul class="list-inline title">
                                                    <li>
                                                        <p>Thông tin bác sĩ</p>
                                                    </li>
                                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <p><?php echo e($level->name); ?></p>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <ul class="list-inline name">
                                                    <li>
                                                        <p>Tên</p>
                                                    </li>
                                                     <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <p><?php echo e(isset($arrMedical[$key][$level->id]->hoten) ? $arrMedical[$key][$level->id]->hoten : ""); ?></p>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </ul>
                                                <ul class="list-inline name-account">
                                                    <li>
                                                        <p>Username</p>
                                                    </li>
                                                     <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <p><?php echo e(isset($arrMedical[$key][$level->id]->userid) ? $arrMedical[$key][$level->id]->userid : ""); ?></p>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <ul class="list-inline time">
                                                    <li>
                                                        <p>Thời gian</p>
                                                    </li>
                                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <p><?php echo e(isset($arrMedical[$key][$level->id]->username) ? $arrMedical[$key]["history"]->updated_at : ""); ?></p>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <form action="<?php echo e(route('post.admin.revert_status')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="id" value="<?php echo e($medical_bill->id); ?>">
                                            <div class="row">
                                                <div style="padding: 0 30px">
                                                    <label for="">Chọn trạng thái</label>
                                                    <select name="study_status" id="">
                                                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($status->id); ?>"><?php echo e($status->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row text-right">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 0px;">Lưu lại</button>
                                                <button class="btn btn-primary clear" style="margin-top: 0px;">Hủy bỏ</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="page-nav text-right">
                        <nav aria-label="Page navigation">
                            <?php echo e($medical_bills->appends([
                                'content' => request()->content,
								'limit' => request()->limit
                            ])->links('vendor.pagination.admin_user')); ?>

                        </nav>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="libs/jQuery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7-->
    <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery-ui-->
    <script src="libs/datepicker/jquery-ui.js"></script>
    <script src="libs/datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Slimscroll-->
    <script src="libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick-->
    <script src="libs/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App-->
    <script src="libs/adminlte/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes-->
    <script src="js/script.js"></script>
    <script>
        $('.edit').click(function (e) { 
            e.preventDefault();
            
            var is_actived = $(this).closest("tr").next(".table-hide").hasClass("active");

            if(is_actived) {
                $(".table-hide").removeClass("active");   
                return;
            }
            $(".table-hide").removeClass("active");
            $(this).closest("tr").next(".table-hide").addClass("active");
            return;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>