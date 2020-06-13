<?php $__env->startSection('title','Tạo template'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="edit-template">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Tạo template</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                    <li><a href="<?php echo e(route('admin.index')); ?>">Quản trị</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="#">Tạo template</a></li>
                </ul>
            </div>
            <div class="clear-fix"></div>
        </div>
        <!--.topbar-wrap-->
        <div class="account-permiss__content">
            <form action="<?php echo e(route('admin.template.store')); ?>" method="POST" id="update-form">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                   <!--  <div class="edit-input">
                        <label>Mã dịch vụ</label>
                        <input class="form-control" name="MaSo"/>
                        <div class="clear-fix"></div>
                    </div> -->
                    <div class="edit-input">
                        <label>Tên dịch vụ</label>
                        <input class="form-control" name="TenNoiDung" style="float:left; width: 500px" />
                        <div class="clear-fix"></div>
                    </div>                   
                    <div class="edit-input">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="KetQua_Text" id="summernote" cols="10" rows="10" style="float:left; width: 500px"></textarea>
                        <div class="clear-fix"></div>
                    </div>
                         <div class="edit-input">
                            <label>Kết luận</label>
                            <input class="form-control" name="KetLuan" style="float:left; width: 500px" />
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
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['picture']],
                ['fontsize', ['fontsize']],
                ],
                height: 500,                
                minHeight: 150,           
                maxHeight: 500,             
                focus: true,
                tabsize: 2,
                placeholder: 'Nơi viết mô tả'    
            });
        </script>
        <?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>