@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
@endsection
@section('content')
    <div class="cover-overlay"></div>

    <div class="main">
        @include('partial.dash-header')
        <a class="new-plan" href='{{url('no-plan')}}'>
            New Plans
        </a>
        <div class="cards">
            @forelse ($user->plans->take(4) as $plan)
                <a style="text-decoration: none; text-transform: none" href="{{url('plan',$plan)}}">
                    @php
                        $colors = ['brown','pink', 'orange', 'blue', 'green'];
                    @endphp
                    <div class="card {{array_random($colors)}}">
                        <div class="header">
                            {{$plan->plan_name}}
                        </div>
                        <div class="content">
                            <div class="content__properties">
                                <p class="content__properties__header">List of Properties</p>
                                <p class="content__properties__details">
                                    <span class="title">Units of Block</span>
                                    <span class="amount">0/</span>
                                    <span class="target-amount">{{$plan->block_target}}</span>
                                </p>
                                <p class="content__properties__details">
                                    <span class="title">Bags of Cement</span>
                                    <span class="amount">0/</span>
                                    <span class="target-amount">{{$plan->cement_target}}</span>
                                </p>
                            </div>
                            <div class="content__amount__deposited">
                                <p class="content__amount__deposited__header">Amount deposited</p>
                                <p class="amount">
                                    ₦ {{nf($plan->deposit,0)}}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="card">
                    <div class="header">Empty Plan</div>
                    <div class="content">
                        NO PLAN COULD BE FOUND
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@stop
@section('scripts')

@stop
