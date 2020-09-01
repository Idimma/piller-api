@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/viewplan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
@endsection
@section('content')
    <div class="cover-overlay"></div>
    <main>
        <div class="main-container">
            @include('partial.dash-header')
            <div class="main-body">
                <div class="header-bar">
                    <h2><span class="underline">{{explode(" ",$plan->plan_name)[0]}}</span>
                        {{implode(" ", explode(" ",$plan->plan_name, -2))}}</h2>
                    <div class="header-bar-options">
                        <div class="header-bar-option view">
                            <img src="{{asset('assets/images/ios-create.svg')}}" alt="">
                            <a class="header-bar-option-link" href="{{url('plan/edit', $plan)}}">
                                <p class="header-bar-option-text">Edit</p>
                            </a>
                        </div>
                        <div class="header-bar-option view">
                            <img src="{{asset('assets/images/add-purple.svg')}}" style="margin-bottom: 2px " alt="">
                            <a class="header-bar-option-link" href="#" onclick="addFunds({{$plan->id}})">
                                <p class="header-bar-option-text">Add Funds</p>
                            </a>
                        </div>

                        <div class="header-bar-option view">
                            <img src="{{asset('assets/images/wallet.svg')}}" alt="">
                            <a class="header-bar-option-link" href="{{url('plan/withdraw', $plan)}}">
                                <p class="header-bar-option-text">Withdraw</p>
                            </a>
                        </div>

                        <div class="header-bar-option cancel">
                            <img src="{{asset('assets/images/ios-close.svg')}}" alt="">
                            <a class="header-bar-option-link" href="#" onclick="closePlan({{$plan->id}})">
                                <p class="header-bar-option-text">Close</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="view-body">
                    <div class="left-detail">
                        <div class="left-detail-Box">
                            <h2 class="box-header">
                                Balance
                            </h2>
                            <div class="box-block giant">
                                <div class="groupMe">
                                    <div class="unit-box">
                                        <p class="unit-box-header">
                                            Units of Block
                                        </p>
                                        <div class="unit-value">
                                            {{$plan->block_target}}
                                        </div>
                                    </div>
                                    <div class="unit-box margin-right">
                                        <p class="unit-box-header">
                                            Bags of Cement
                                        </p>
                                        <div class="unit-value">
                                            {{$plan->cement_target}}
                                        </div>
                                    </div>
                                </div>
                                <p class="deposit">Auto deposit amount <span class="green">
                                            &#8358 {{nf($plan->deposit)}}
                                    </span>
                                </p>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Deposit Frequency
                                    </p>
                                    <div class="unit-value">
                                        {{$plan->frequency}}
                                    </div>
                                </div>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Next Deposit Date
                                    </p>
                                    <div class="unit-value">
                                        {{$plan->next_deposit_date}}
                                    </div>
                                </div>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Assigned Card
                                    </p>
                                    <div class="unit-value">
                                        {{$plan->card ? $plan->card->bank : ''}}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="{{url('plan/withdraw', $plan)}}">
                            <button class="btn">
                                Cash Out
                            </button>
                        </a>

                        <p class="warning">
                            When you cash out Stokkpile buys the materials accumuated at a 40% percent discount rate.
                        </p>
                    </div>

                    <div class="plans-body list">
                        <div class="plan-Header">
                            <div class="detail-container">
                                S/N
                            </div>
                            <div class="detail-container">
                                Transaction ID
                            </div>
                            <div class="detail-container">
                                Billing Date
                            </div>
                            <div class="detail-container">
                                Amount (&#8358)
                            </div>
                        </div>

                        @forelse($plan->transactions as $transaction)
                            <div class="plan-group">
                                <div class="detail-container">
                                    <p class="tag">S/N :</p>
                                    <span class="response">{{$transaction->id}}.</span>
                                </div>
                                <div class="detail-container">
                                    <p class="tag">Transaction ID:</p>
                                    <span class="response">{{$transaction->reference}}</span>
                                </div>
                                <div class="detail-container">
                                    <p class="tag">Biling Date: </p>
                                    <span class="response">{{$transaction->created_at}}</span>
                                </div>
                                <div class="detail-container">
                                    <p class="tag">Blocks</p>
                                    <span class="response">{{nf($transaction->block)}}</span>
                                </div>
                                <div class="detail-container">
                                    <p class="tag">Cements </p>
                                    <span class="response">{{nf($transaction->cement)}}</span>
                                </div>
                                <div class="detail-container">
                                    <p class="tag"> Amount (&#8358) </p>
                                    <span class="response"><h3>{{nf($transaction->amount)}}</h3></span>
                                </div>
                            </div>
                        @empty
                            <h3>No Transaction found</h3>
                        @endforelse
                    </div>
                    {{--                    <div class="plans-body invoice" >--}}
                    {{--                        <div class="invoice-row invoice-row-header">--}}
                    {{--                            <div class="left-heading">--}}
                    {{--                                <p class="additonal-info">Reciept for</p>--}}
                    {{--                                <h2>Stokkpile</h2>--}}
                    {{--                                <p class="additional-info">Building your fute house one step at a time</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="right-heading">--}}
                    {{--                                <h2>INVOICE</h2>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Transaction ID--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value">{{$plan->reference}}</p>--}}
                    {{--                            </div>--}}
                    {{--                            <hr/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Billing Date & Time--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value">--}}
                    {{--                                    {{$plan->reference}}--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                            <hr/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Card Number--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value">--}}
                    {{--                                    012-xxx-789--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                            <hr/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Block Rate--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value">--}}
                    {{--                                    200--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                            <hr/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Cement Rate--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value">--}}
                    {{--                                    100--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                            <hr/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="invoice-row invoice-detail">--}}
                    {{--                            <div class="exception">--}}
                    {{--                                <p class="detail">--}}
                    {{--                                    Amount Deposited--}}
                    {{--                                </p>--}}
                    {{--                                <p class="value value-price">--}}
                    {{--                                    $ 3000--}}
                    {{--                                </p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>


            </div>
            @include('partials.bottom-rates')
        </div>
    </main>
@stop

@section('scripts')
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    {{--    <script src="{{asset('assets/js/viewplan.js')}}"></script>--}}
    <script>

        function addFunds(id) {
            swal({
                title: "Add Funds?",
                text: 'Enter the amount you want to add',
                content: "input",
                icon: "success", button: {text: "Submit", closeModal: true,},
            }).then((amount) => {
                if (amount) {
                    swal({
                        text: 'Enter your password to authenticate your closure',
                        content: "input",
                        button: {text: "Submit", closeModal: false,},
                    }).then((password) => {
                        if (password) {
                            return window.location.href = '{{url('plan/fund')}}/' + id + '/' + amount + '/' + password
                        } else {
                            return Toastify({
                                text: 'Password box can not be empty',
                                close: true, backgroundColor: 'red'
                            }).showToast();
                        }
                    });
                } else {
                   return  Toastify({
                        text: 'Amount box can not be empty',
                        close: true, backgroundColor: 'red'
                    }).showToast();
                }
            });
        }

        function closePlan(id) {
            swal({
                title: "Are you sure?",
                text: "Once closed, you will not be able to recover this plan!",
                icon: "warning", buttons: true, dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal({
                        text: 'Enter your password to authenticate your closure',
                        content: "input",
                        button: {text: "Submit", closeModal: false,},
                    }).then((password) => {
                        if (password) {
                            window.location.href = '{{url('plan/close')}}/' + id + '/' + password
                        } else {
                            Toastify({
                                text: 'Password box can not be empty',
                                close: true, backgroundColor: 'red'
                            }).showToast();
                        }
                    });
                }
            });
        }
    </script>
@stop


