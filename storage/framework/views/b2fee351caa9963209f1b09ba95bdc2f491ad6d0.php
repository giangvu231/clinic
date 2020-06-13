<?php $__env->startSection('title','Admin User'); ?>
<?php $__env->startSection('css'); ?>
    .user.active {
        background: highlight;
    }
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="account-permiss">
            <div class="topbar topbar-wrap">
                <div class="top-title fleft">
                    <h2>Phân quyền người dùng</h2>
                </div>
                <div class="top-menu fright">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-tachometer"></i></a></li>
                        <li><a href="<?php echo e(route('admin.index')); ?>">Quản trị</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="<?php echo e(route('admin.user.permission')); ?>">Phân quyền người dùng</a></li>
                    </ul>
                </div>
                <div class="clear-fix"></div>
            </div>
            <!--.topbar-wrap-->
            <div class="account-permiss__content">
                <div class="account-permiss__search">
                    <h3>Tìm tài khoản</h3>
                    <div class="form-search">
						<form action="">
                            <div class="form-group">
                                <input class="form-control fleft" name="name" value="<?php echo e(request()->name); ?>" placeholder="Tìm theo tên"/>
                                <select class="form-control fleft" name="level_id">
                                    <option class="disable" value="">Quyền hạn</option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input class="fleft" type="submit" value="Tìm kiếm"/>
                                <div class="clear-fix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end account-search-->
                <div class="account-permiss__title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Danh sách tài khoản</h3>
                        </div>
                        <div class="col-sm-4">
                            <h3>Các trạng thái chỉ định</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form action="<?php echo e(route('admin.change.permission')); ?>" method="POST" id="change-permission-form">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="account-permiss__list">
                            <div class="col-sm-8">
                                <div class="table1">
                                    <table>
                                        <tr>
                                            <td>#</td>
                                            <td>Tên tài khoản</td>
                                            <td>Tên người dùng</td>
                                            <td>Quyền hạn</td>
                                        </tr>

                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="user user<?php echo e($user->id); ?> <?php echo e($key == 0 ? "active" : ""); ?>" onclick="userClick(this,<?php echo e($user->id); ?>)">
                                                <td><?php echo e((($users->currentPage() - 1 ) * $users->perPage()) + ($key+1)); ?></td>
                                                <td><?php echo e($user->userid); ?></td>
                                                <td><?php echo e($user->hoten); ?></td>
												<td><?php echo e($user->level->name); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="4">
                                                <div class="pull-left" style="float:right!important;">
                                                <?php echo e($users->appends([
                                                    'name' => request()->name,
													'level_id' => request()->level_id
                                                ])->links('vendor.pagination.admin_user')); ?></div>
                                                <div class="clearfix"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-4 permission permission<?php echo e($user->id); ?>" style="display:<?php echo e($key == 0 ? "" : "none"); ?>">
                                    <div class="row">
                                        <?php if(!$user->isAdmin()): ?>
                                            <?php $__currentLoopData = getUserStt($user); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($stt["is_checked"]): ?>
                                                    <div class="form-check">
                                                        <div class="form-check__item">
                                                            <input type="checkbox" name="status_id[<?php echo e($user->id); ?>][]" value="<?php echo e($stt["id"]); ?>" checked/>
                                                            <label for="datlich">
                                                                <?php echo e($stt["name"]); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-check">
                                                        <div class="form-check__item">
                                                            <input type="checkbox" name="status_id[<?php echo e($user->id); ?>][]" value="<?php echo e($stt["id"]); ?>"/>
                                                            <label for="datlich">
                                                                <?php echo e($stt["name"]); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="account-permiss__btn">
                            <div class="save-btn"><button type="submit">Lưu</button></div>
                            <div class="cancel-btn"><button type="reset">Hủy</button></div>
                        </div>
                    </form>
                </div>
                <!--end account-list-->
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function userClick(self,id){
            $(".active").removeClass("active");
            $(".user"+id).addClass("active");
            $(".permission").hide();
            $(".permission"+id).show();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>