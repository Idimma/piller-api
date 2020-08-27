@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/plan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
@endsection
@section('content')
    <div class="cover-overlay"></div>
    <main>
        <div class="main-container">
            @include('partial.dash-header')
            <div class="main-body">
                <div class="empty-div">
                    <div class="add-plan-image">
                        <img src="{{asset('assets/images/Group 5.svg')}}" alt="" class="Add-plan">
                    </div>
                    <div class="choose-deposit-option">
                        <a href="{{url('deposit/normal')}}" class="plan-type plan-type-normal">
                            <img src="{{asset('assets/images/Group 89.svg')}}" alt="">
                            <p>Normal deposit</p>
                        </a>
                        <a href="{{url('deposit/one-time')}}" class="plan-type plan-type-once">
                            <img src="{{asset('assets/images/Group 89.svg')}}" alt="">
                            <p>One-time deposit</p>
                        </a>
                    </div>
                </div>
            </div>
            @include('partials.bottom-rates')
        </div>
    </main>
@stop

@section('scripts')
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
@stop
