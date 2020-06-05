<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
</head>
<body>
@include('partials._header')

@yield('content')

@include('partials._footer')
@yield('scripts')
@stack('scripts')
</body>
</html>

<!-- Mixins-->
