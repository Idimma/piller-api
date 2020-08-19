@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
@endsection
@section('content')
    <div class="main">
        @include('partial.dash-header')
        <a class="new-plan" href='{{url('no-plan')}}'>
            New Plans
        </a>
        <div class="cards">
            <div class="card brown">
                <div class="header">
                    Lagos House
                </div>
                <div class="content">
                    <div class="content__properties">
                        <p class="content__properties__header">List of Properties</p>
                        <p class="content__properties__details">
                            <span class="title">Units of Block</span>
                            <span class="amount">1000/</span>
                            <span class="target-amount">2000</span>
                        </p>
                        <p class="content__properties__details">
                            <span class="title">Bags of Cement</span>
                            <span class="amount">26/</span>
                            <span class="target-amount">
                                    100
                                </span>
                        </p>
                    </div>
                    <div class="content__amount__deposited">
                        <p class="content__amount__deposited__header">Amount deposited</p>
                        <p class="amount">
                            ₦10,000
                        </p>
                    </div>
                </div>
            </div>
            <div class="card blue">
                <div class="header">
                    America's House
                </div>
                <div class="content">
                    <div class="content__properties">
                        <p class="content__properties__header">List of Properties</p>
                        <p class="content__properties__details">
                            <span class="title">Units of Block</span>
                            <span class="amount">1000/</span>
                            <span class="target-amount">2000</span>
                        </p>
                        <p class="content__properties__details">
                            <span class="title">Bags of Cement</span>
                            <span class="amount">26/</span>
                            <span class="target-amount">
                                    100
                                </span>
                        </p>
                    </div>
                    <div class="content__amount__deposited">
                        <p class="content__amount__deposited__header">Amount deposited</p>
                        <p class="amount">₦10,000</p>
                    </div>
                </div>
            </div>
            <div class="card pink">
                <div class="header">
                    Kenya House
                </div>
                <div class="content">
                    <div class="content__properties">
                        <p class="content__properties__header">List of Properties</p>
                        <p class="content__properties__details">
                            <span class="title">Units of Block</span>
                            <span class="amount">1000/</span>
                            <span class="target-amount">2000</span>
                        </p>
                        <p class="content__properties__details">
                            <span class="title">Bags of Cement</span>
                            <span class="amount">26/</span>
                            <span class="target-amount">
                                    100
                                </span>
                        </p>
                    </div>
                    <div class="content__amount__deposited">
                        <p class="content__amount__deposited__header">Amount deposited</p>
                        <p class="amount">₦10,000</p>
                    </div>
                </div>
            </div>
            <div class="card green">
                <div class="header">
                    Kenya Office
                </div>
                <div class="content">
                    <div class="content__properties">
                        <p class="content__properties__header">List of Properties</p>
                        <p class="content__properties__details">
                            <span class="title">Units of Block</span>
                            <span class="amount">1000/</span>
                            <span class="target-amount">2000</span>
                        </p>
                        <p class="content__properties__details">
                            <span class="title">Bags of Cement</span>
                            <span class="amount">26/</span>
                            <span class="target-amount">
                                    100
                                </span>
                        </p>
                    </div>
                    <div class="content__amount__deposited">
                        <p class="content__amount__deposited__header">Amount deposited</p>
                        <p class="amount">₦10,000</p>
                    </div>
                </div>
            </div>
        </div>
        <table class="rates bottom">
            <tr>
                <td>Rates</td>
                <td>Block</td>
                <td>Cement</td>
            </tr>
            <tr>
                <td>Local</td>
                <td>
                    <img src="../assets/images/rate-down.svg">
                    &#8358 1000
                </td>
                <td>
                    <img src="../assets/images/rate-up.svg">
                    &#8358 2000
                </td>
            </tr>
            <tr>
                <td>International</td>
                <td>
                    <img src="../assets/images/rate-down.svg">
                    $2
                </td>
                <td>
                    <img src="../assets/images/rate-up.svg">
                    $2
                </td>
            </tr>
        </table>
    </div>
@stop
@section('scripts')

@stop
