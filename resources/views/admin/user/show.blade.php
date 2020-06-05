@extends('admin.layouts.app')
@section('title','Xem User')
@section('css')
    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="wrapper">
        <aside class="side-nav">
            <div class="side-notification">
                <div class="notification-icon">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <div class="notification-icon">
                    <div class="notification-badge bounceInDown animated timer" data-from="0" data-to="21">21</div>
                    <i class="fa fa-comments"></i>
                    <div class="notification-wrapper animated bounceInUp">
                        <div class="notification-header">Notifications <span class="notification-count">3</span></div>
                        <div class="notification-body">
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Mark</strong> sent you a message</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/chocolate.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Lisa</strong> sent you a message</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                        </div>
                        <div class="notification-footer">
                            <a href="form_validation.html">See all notifications</a>
                        </div>
                    </div>
                </div>
                <div class="notification-icon">
                    <div class="notification-badge bounceInDown animated timer" data-from="0" data-to="3">3</div>
                    <i class="fa fa-bell"></i>
                    <div class="notification-wrapper animated bounceInUp">
                        <div class="notification-header">Notifications <span class="notification-count">3</span></div>
                        <div class="notification-body">
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Mark</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/chocolate.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Lisa</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/belts.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Parker</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Sophie</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Sophie</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                            <a class="notification-list" href="form_validation.html">
                                <div class="notification-image">
                                    <img alt="pongo" src="{{asset('assets/images/asparagus.jpg')}}">
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text"><strong>Sophie</strong> sent you a email</div>
                                    <div class="notification-time">1 minutes ago</div>
                                </div>
                            </a>
                        </div>
                        <div class="notification-footer">
                            <a href="form_validation.html">See all notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-side-profile">
                <div class="user-image">
                    <div class="user-on"></div>
                    <img alt="pongo" src="{{asset('assets/images/profile.png')}}">
                </div>
                <div class="clear">
                    <div class="user-name">John Doe</div>
                    <div class="user-group">Administrator</div>
                    <ul class="user-side-menu animated bounceInUp">
                        <li><a href="form_validation.html">Profile
                                <div class="badge badge-yellow pull-right">2</div>
                            </a></li>
                        <li><a href="form_validation.html">Settings</a></li>
                        <li><a href="form_validation.html">Change Password</a></li>
                        <li><a href="form_validation.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-menu-title">Menu</div>
            <div class="main-menu">
                <ul>
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="fa fa-bars"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.user.index')}}">
                            <i class="fas fa-user-tie"></i>
                            <span>User</span>
                            <div class="badge badge-red pull-right">2</div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="fa fa-window-restore"></i>
                            <span>Template</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <!-- <div class="breadcrumb">
                <a href="form_validation.html">Home</a>
                <a href="form_validation.html">Products</a>
                <a href="form_validation.html">Iphone 6</a>
            </div> -->
            <div class="content">
                <div class="panel">
                    <div class="content-header no-mg-top">
                        <i class="fa fa-newspaper-o"></i>
                        <div class="content-header-title">Form Validation</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Device</th>
                                            <th class="text-center">Room</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center"><a
                                                        href="{{route('admin.user.show',['user'=>$user->id])}}"
                                                        title="">{{$user->name}}</a></td>
                                            <td class="text-center">{{$user->username}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td class="text-center">{{$user->level}}</td>
                                            <td class="text-center">{{$user->devices->name}}</td>
                                            <td class="text-center">{{$user->room->name}}</td>
                                            <td class="text-center">
                                                <form action="{{route('admin.user.destroy',['user'=>$user->id])}}"
                                                      method="post">
                                                    {!! method_field('delete') !!}
                                                    {!! csrf_field() !!}
                                                    <a href="{{route('admin.user.edit',['user'=>$user->id])}}" title="">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button type="submit"><a href="" title=""><i
                                                                    class="fa fa-trash"></i></a></button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-validator/dist/validator.min.js')}}"></script>
@endsection