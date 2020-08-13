<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cititasker Dashboard">
    <meta name="author" content="Gidicodes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lay Buy') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
    {{-- rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    @yield('links')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center bg-white justify-content-center" href="/">
                <div class="sidebar-brand-icon bg-white">
                    {{---- <img src="{{asset('img/icon.png')}}" style="width: 20px" alt="Logo" /> ---}}
                </div>
                <div class="sidebar-brand-text text-primary mx-3">StockPiller</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Users -->
            <li class="nav-item {{ linkActive('home') }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('User Management') }}
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ linkActive('users') }}">
                <a class="nav-link" href="{{ route('users') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>{{ __('Users') }}</span>
                </a>
            </li>


            <li class="nav-item {{ linkActive('admins') }}">
                <a class="nav-link" href="{{ route('admins') }}">
                    <i class="fas fa-fw fa-user-shield"></i>
                    <span>{{ __('Admins') }}</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Activities') }}
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ linkActive('tasks') }}">
                <a class="nav-link" href="{{ route('tasks') }}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>{{ __('Tasks') }}</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ linkActive('transactions') }}">
                <a class="nav-link" href="{{ route('transactions') }}">
                    <i class="fas fa-fw fa-money-bill-alt"></i>
                    <span>{{ __('Transaction / Payments') }}</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            {{--- <li class="nav-item {{ linkActive('reports') }}">
            <a class="nav-link" href="{{ route('reports') }}">
                <i class="fas fa-fw fa-reply"></i>
                <span>{{ __('Reported / Issues') }}</span></a>
            </li> ---}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Settings') }}
            </div>

            <!-- Nav Item - About -->
            <li class="nav-item {{ linkActive('settings') }}">
                <a class="nav-link" href="{{ route('settings') }}">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>{{ __('Settings') }}</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: rgb(240,240,240)">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    {{--- @include('partial.topbar-search') ---}}
                    <ul class="navbar-nav ml-auto">

                        {{--- @include('partial.search-form') ---}}
                        {{--- @include('partial.dashboard-alerts') ---}}
                        {{--- @include('partial.dashboard-messages') ---}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->last_name }}</span>
                                <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ auth()->user()->last_name[0] ?? '' }}"></figure>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profile') }}
                                </a>
                                {{--- <a class="dropdown-item" href="{{url('notifications')}}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Notifications') }}
                                </a> ---}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">
                    @yield('main-content')
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; StockPiller 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @yield('script')
</body>

</html>