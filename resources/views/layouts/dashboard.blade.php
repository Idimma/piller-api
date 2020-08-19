<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokkpiler | Dashboard</title>
    @include('partial.toastAlert')
    @yield('links')
</head>
<body>
{{--<div class="container">--}}
@include('partial.sidebar-mobile')
@include('partial.sidebar')
@yield('content')
{{--</div>--}}
<script src="{{asset('assets/js/sidenav.js')}}"></script>
@yield('scripts')
</body>
</html>
