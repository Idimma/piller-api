@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $user->last_name.'\'s Profile' }}</h1>

<div class="row ">

    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="row m-3">
                <div class="card-profile-image col-sm-3 mr-auto">
                    <img src="{{$user->image_url ? $user->avatar_url : asset('6.jpg')}}" class="rounded-circle" alt="user-image">
                </div>
                <div class="col-sm-8  mt-sm-3">
                    <h3>{{$user->last_name .' '. $user->first_name}}</h3>
                    <div>{{$user->email}}</div>
                    <div>{{$user->phone}}</div>
                    <div>{{$user->is_verified?"Verified": 'Not Verified'}}</div>
                </div>
            </div>
            <div class="card-body">
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="font-weight-bold">Plans</h5>
                        <p>Has {{$user->plans->count()}} plan(s) saved since joining {{$user->created_at->diffForHumans()}} </p>
                        <a href='{{url("user/$user->uuid/plans")}}' target="_blank" class="btn btn-primary ">
                            <i class="fab fa-list fa-fw"></i> View all Plans
                        </a>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="font-weight-bold">Credits</h5>
                        <p>Laravel SB Admin 2 uses some open-source third-party libraries/packages, many thanks to the
                            web community.</p>
                        <ul>
                            <li><a href="https://laravel.com" target="_blank">Laravel</a> - Open source framework.</li>
                            <li><a href="https://github.com/DevMarketer/LaravelEasyNav" target="_blank">LaravelEasyNav</a> - Making managing navigation in Laravel easy.
                            </li>
                            <li><a href="https://startbootstrap.com/themes/sb-admin-2" target="_blank">SB Admin 2</a> -
                                Thanks to Start Bootstrap.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection