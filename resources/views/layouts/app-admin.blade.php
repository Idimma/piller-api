<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokkpiler | @yield('title', ' ')
    </title>
    @include('partial.toastAlert')
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/dashboard-admin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
</head>
<body>
<div class="container">
    @include('partials.admin-sidebar')
    <div class="main">
        @include('partials.admin-topbar')
        @yield('content')
    </div>
</div>
<script src="{{asset('assets/js/sidenav.js')}}"></script>
@yield('script')

</body>
</html>
