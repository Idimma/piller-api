<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokkpiler | Customers</title>
    @include('partial.toastAlert')
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/customers.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
</head>
<body>
    <div class="container">
        @include('partials.admin-sidebar')
        <div class="main">
            @include('partials.admin-topbar')
            <div class="content">
                <div class="customer-table">
                    <div class="customer-table__row customer-table__row--header">
                        <span>Customer Name</span>
                        <span>Email</span>
                        <span>Phone</span>
                        <span>Location</span>
                    </div>

                    @forelse ($users as $user)
                        <div class="customer-table__row">
                            <span class="customer-table__name"><span class="label">Name:</span>
                                {{$user->last_name .' '. $user->first_name }}</span>
                            <span><span class="label">Email:</span> {{$user->email}}</span>
                            <span><span class="label">Phone:</span> {{$user->phone}}</span>
                            <span><span class="label">Location:</span> {{$user->country}}</span>
                            <a href="{{url('customer', $user->uuid)}}" class="customer-table__link">
                                <img src="{{asset('assets/images/eye.svg')}}" alt="password-icon">
                                <span>View Details</span>
                            </a>
                        </div>
                    @empty
                        <div>
                            <h3>Empty </h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/sidenav.js')}}"></script>
</body>
</html>
