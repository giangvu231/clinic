<?php $__env->startSection('title','Sửa template'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="edit-template">
            <div class="topbar topbar-wrap">
                <div class="top-title fleft">
                    <h2>Sửa template</h2>
                </div>
                <div class="top-menu fright">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                        <li><a href="<?php echo e(route('admin.index')); ?>">Quản trị</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="#">Sửa template</a></li>
                    </ul>
                </div>
                <div class="clear-fix"></div>
            </div>
            <!--.topbar-wrap-->
            <div class="account-permiss__content">
                <form action="<?php echo e(route('admin.template.update', ['id'=>$template->TuDienKetQua_Id])); ?>" method="POST" id="update-form">
                    <?php echo e(method_field('PUT')); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="edit-input">
                            <label>Mã dịch vụ</label>
                            <input class="form-control" value="<?php echo e($template->MaSo); ?>" name="MaSo"/>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="edit-input">
                            <label>Tên dịch vụ</label>
                            <input class="form-control" value="<?php echo e($template->TenNoiDung); ?>" name="TenNoiDung" style="float:left; width: 500px" />
                            <div class="clear-fix"></div>
                        </div>
                        <div class="edit-input">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="KetQua_Text" id="" cols="10" rows="10" style="float:left; width: 500px"><?php echo e($template->KetQua_Text); ?></textarea>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="edit-input">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option class="disable" value="">Trọn trạng thái</option>
                                <option value="1" <?php echo e($template->status == 1? "selected" : ""); ?>>Hoạt động</option>
                                <option value="0" <?php echo e($template->status == 0? "selected" : ""); ?>>Ẩn</option>
                            </select>
                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e(Session::forget('errors')); ?>   
                    <div class="account-permiss__btn">
                        <div class="save-btn">
                            <button type="reset"><a href="<?php echo e(route('admin.template.index')); ?>">Hủy</a></button>
                        </div>
                        <div class="cancel-btn">
                            <button type="submit">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>