@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/plan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
@endsection
@section('content')
    <div class="main-body">
        <div class="empty-div">
            <div class="add-plan-image">
                <img src="../assets/images/Group 5.svg" alt="" class="Add-plan">
            </div>
            <div class="choose-deposit-option">
                <a href="./Add-normal-deposit-plan.html" class="plan-type plan-type-normal">
                    <img src="../assets/images/Group 89.svg" alt="">
                    <p>Normal deposit</p>
                    <!-- <img src="../assets/images/Group 90.svg" alt="" class="normal-deposit">                                 -->
                </a>
                <a href="./Add-one-time-deposit-plan.html" class="plan-type plan-type-once">
                    <img src="../assets/images/Group 89.svg" alt="">
                    <!-- <img src="../assets/images/Group 91.svg" alt="" class="one-time-deposit">                                 -->
                    <p>One-time deposit</p>
                </a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-inner">
            <table class="stocks">
                <tr>
                    <td>Rates</td>
                    <td>Blocks</td>
                    <td>Cement</td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td>
                        <img src="../assets/images/Group 44.svg" alt="">
                        <h3>&#8358 200</h3>
                    </td>
                    <td>
                        <img src="../assets/images/Group 38.svg" alt="">
                        <h3>&#8358 200</h3>
                    </td>
                </tr>
                <tr>
                    <td>Internatinal</td>
                    <td>
                        <img class="down-arrow" src="../assets/images/Group 44.svg" alt="">
                        <h3>$2</h3>
                    </td>
                    <td>
                        <img class="up-arrow" src="../assets/images/Group 38.svg" alt="">
                        <h3>$2</h3>
                    </td>
                </tr>

            </table>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
@stop
<script src="../assets/js/no-plans.js"></script>
<script src="../assets/js/sliderAction.js"></script>
<script src="../assets/js/Required-inputs.js"></script>
