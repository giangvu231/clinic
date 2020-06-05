<div id="wrapper" style="min-height: 100%;">
    <header id="header">
        <header class="main-header">
            <a class="logo" href="{{route('get.exams.view')}}">
                <span class="logo-mini">PK</span>
                <span class="logo-lg"><b>Admin</b></span>
            </a>
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
                                <img class="user-image" src="{{asset('administrator/dist/images/logo.jpg')}}" alt="User Image"/>
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu"> 
                                <li class="user-header">
                                    <img  src="{{asset('administrator/dist/images/logo.jpg')}}" alt="User Image"/>
                                    <p>
                                        {{Auth::user()->name}}
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="{{route('get.changepassword.view')}}">Đổi mật khẩu</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{route("get.logout")}}">Đăng xuất</a>
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
                    <img class="img-circle" src="{{asset('administrator/dist/images/logo.jpg')}}" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p><a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Danh mục</li>
                <!-- <li class="treeview {{ Route::currentRouteNamed('admin.template.*') ? 'menu-open' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Mẫu kê đơn</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: {{ Route::currentRouteNamed('admin.template.*') ? 'block' : 'none' }}">
                        <li class="{{ Route::currentRouteNamed('admin.template.index') ? 'active' : '' }}"><a href="{{route('admin.template.index')}}"><i
                                        class="fa fa-circle-o"></i>Danh sách mẫu</a></li>
                        <li class="{{ Route::currentRouteNamed('admin.template.create') ? 'active' : '' }}"><a href="{{route('admin.template.create')}}"><i class="fa fa-circle-o"></i>Thêm mẫu</a></li>
                    </ul>
                </li> -->
                <li class="{{ Route::currentRouteNamed('get.statics.index') ? 'active' : '' }}">
                    <a href="{{route('get.statics.index')}}">
                        <i class="fa fa-files-o"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                <!-- thuốc -->
                 <li class="treeview {{ Route::currentRouteNamed('admin.template.*') ? 'menu-open' : '' }}">
                    <a href="#">
                        <i class="fa fa-medkit"></i>
                        <span>Quản lý thuốc</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                     <ul class="treeview-menu" style="display: {{ Route::currentRouteNamed('admin.supplies.*') ? 'block' : 'none' }}">
                        <li class="{{ Route::currentRouteNamed('admin.supplies.index') ? 'active' : '' }}">
                            <a href="{{route('admin.supplies.index')}}">
                                <i class="fa fa-circle-o"></i>
                                Danh sách thuốc
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteNamed('admin.supplies.create') ? 'active' : '' }}"><a href="{{route('admin.supplies.create')}}"><i
                                        class="fa fa-circle-o"></i>Thêm thuốc mới</a>
                        </li>
                    </ul>
                </li>
              
				<li class="treeview {{ Route::currentRouteNamed('admin.template.*') ? 'menu-open' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Quản lý nhân viên</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: {{ Route::currentRouteNamed('admin.user.*') ? 'block' : 'none' }}">
                        <li class="{{ Route::currentRouteNamed('admin.user.index') ? 'active' : '' }}"><a href="{{route('admin.user.index')}}"><i
                                        class="fa fa-circle-o"></i>Danh sách nhân viên</a></li>
                        <li class="{{ Route::currentRouteNamed('admin.user.create') ? 'active' : '' }}"><a href="{{route('admin.user.create')}}"><i
                                        class="fa fa-circle-o"></i>Thêm nhân viên</a></li>

						<!-- {{-- <li class="{{ Route::currentRouteNamed('admin.user.permission') ? 'active' : '' }}"><a href="{{route('admin.user.permission')}}"><i
                                        class="fa fa-circle-o"></i>Phân quyền tài khoản</a></li> --}} -->
                    </ul>
                </li>
                 {{--  <!-- <li class="treeview {{ Route::currentRouteNamed('admin.settings.*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-wrench"></i>
                        <span>Thiết lập</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: {{ Route::currentRouteNamed('admin.settings.*') ? 'block' : 'none' }}">
                        <li class="{{ Route::currentRouteNamed('admin.settings.url2.index') ? 'active' : '' }}"><a href="{{route('admin.settings.url2.index')}}"><i
                                        class="fa fa-circle-o"></i>Thiết lập URL2</a></li>
                    </ul>
                </li>  -->--}}
            </ul>

        </section>
    </aside>
    <div class="clearfix"></div>