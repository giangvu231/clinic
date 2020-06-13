<?php $__env->startSection('title','Sửa thông tin tài khoản'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="topbar topbar-wrap">
            <div class="top-title fleft">
                <h2>Sửa thông tin tài khoản</h2>
            </div>
            <div class="top-menu fright">
                <ul class="list-inline">
					<li><a href="<?php echo e(route('admin.index')); ?>"><i class="fa fa-tachometer"></i></a></li>
					<li><a href="<?php echo e(route('admin.index')); ?>">Quản trị</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<li><a href="<?php echo e(route('admin.user.edit',$user)); ?>">Sửa thông tin tài khoản</a></li>
				 </ul>
            </div>
            <div class="clear-fix">  </div>
        </div>
        <div class="add-account">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <form id="create-user-form" action="<?php echo e(route('admin.user.update',$user)); ?>" method="POST">
                         <?php echo e(method_field('PUT')); ?>

						<?php echo e(csrf_field()); ?>

						<?php if(session()->has('error')): ?>
							<p style="color:red; text-align:center;"><?php echo e(session()->get('error')); ?></p>
						<?php endif; ?>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Họ và tên:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="hoten" value="<?php echo e($user->hoten); ?>" type="text"/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Tên tài khoản:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="userid" value="<?php echo e($user->userid); ?>" type="text" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Số điện thoại:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="dien_thoai" value="<?php echo e($user->dien_thoai); ?>" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Số di động:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="di_dong" value="<?php echo e($user->di_dong); ?>" type="text"/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Mã bác sỹ:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="chung_thu_so" value="<?php echo e($user->chung_thu_so); ?>" type="text" disabled/>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Quyền:</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control level" name="level_id">
										<?php if($levels): ?>
											<?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option <?php echo e($level->id == $user->level_id ? "selected" : ""); ?> value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4">
                                <p>Trạng thái:</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control level" name="status">
                                        <option <?php echo e($user->status == 1 ? "selected" : ""); ?> value="1">Hoạt động</option>
										<option <?php echo e($user->status == 0 ? "selected" : ""); ?> value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Mật khẩu:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="password" type="password"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Nhập lại mật khẩu:</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="password_confirmation" type="password"/>
                            </div>
                        </div>
                        <div class="row">
                            <div id="error"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
								<button class="btn btn-primary" type="submit">Lưu</button>
                                <a style="padding: 8px 12px;border-radius:3px;background:#367fa9;color:#fff" href="<?php echo e(route('admin.user.index')); ?>" title="" style="color: #fff;">Hủy</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>