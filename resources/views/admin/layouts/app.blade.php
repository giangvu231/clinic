<!-- Mixins-->
<!-- Start: topbar-->
<!-- End: topbar--><!DOCTYPE html>
<html>
<head>
    @include('admin.partials._head')

</head>
<body class="hold-transition skin-blue sidebar-mini">

@include('admin.partials._header')

@yield('content')

@include('admin.partials._footer')

@yield('scripts')
</body>
@stack('scripts')
</html>