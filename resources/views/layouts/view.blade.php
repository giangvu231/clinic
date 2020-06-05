<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('partials._head')
</head>
<body>
@include('partials._view-header')

@yield('content-view')

@include('partials._footer')
@yield('scripts')
@stack('scripts')
</body>
</html>