<div id="wrapper" style="min-height: 100%;">
    <header id="header">
        <header class="main-header">
            <a class="logo" href="<?php echo e(route('admin.index')); ?>">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Admin</b></span></a>
            <nav class="navbar navbar-static-top">
                <a class="sidebar-toggle" href="#" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <img class="user-image" src="<?php echo e(asset('administrator/dist/images/user2-160x160.jpg')); ?>" alt="User Image"/>
                                <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img class="img-circle" src="<?php echo e(asset('administrator/dist/images/user2-160x160.jpg')); ?>" alt="User Image"/>
                                    <p>
                                        <?php echo e(Auth::user()->name); ?>

                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="<?php echo e(route('get.changepassword.view')); ?>">Đổi mật khẩu</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="<?php echo e(route("get.logout")); ?>">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="change-language fright">
                    
                  </div>
                <div class="clear-fix"> </div>
            </nav>
        </header>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img class="img-circle" src="<?php echo e(asset('administrator/dist/images/user2-160x160.jpg')); ?>" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p><a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Danh mục</li>
                <li class="treeview <?php echo e(Route::currentRouteNamed('admin.template.*') ? 'menu-open' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Template</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: <?php echo e(Route::currentRouteNamed('admin.template.*') ? 'block' : 'none'); ?>">
                        <li class="<?php echo e(Route::currentRouteNamed('admin.template.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.template.index')); ?>"><i
                                        class="fa fa-circle-o"></i>Danh sách template</a></li>
                        <li class="<?php echo e(Route::currentRouteNamed('admin.template.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.template.create')); ?>"><i
                                        class="fa fa-circle-o"></i>Thêm template</a></li>
                    </ul>
                </li>
                <li class="<?php echo e(Route::currentRouteNamed('get.statics.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('get.statics.index')); ?>">
                        <i class="fa fa-files-o"></i>
                        <span>Thống kê chỉ định</span>
                    </a>
                </li>
				<li class="treeview <?php echo e(Route::currentRouteNamed('admin.template.*') ? 'menu-open' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Tài khoản</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: <?php echo e(Route::currentRouteNamed('admin.user.*') ? 'block' : 'none'); ?>">
                        <li class="<?php echo e(Route::currentRouteNamed('admin.user.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.user.index')); ?>"><i
                                        class="fa fa-circle-o"></i>Danh sách tài khoản</a></li>
                        <li class="<?php echo e(Route::currentRouteNamed('admin.user.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.user.create')); ?>"><i
                                        class="fa fa-circle-o"></i>Thêm tài khoản</a></li>
						<li class="<?php echo e(Route::currentRouteNamed('admin.user.permission') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.user.permission')); ?>"><i
                                        class="fa fa-circle-o"></i>Phân quyền tài khoản</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <div class="clearfix"></div>