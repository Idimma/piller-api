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
                            <a  class="header-bar-option-link" href="{{url('plan/edit', $plan)}}">
                                <p class="header-bar-option-text">Edit</p>
                            </a>
                        </div>
                        <div class="header-bar-option cancel">
                            <img src="{{asset('assets/images/ios-close.svg')}}" alt="">
                            <a class="header-bar-option-link" href="#" onclick="deleteMaterial({{$plan->id}})">
                                <p class="header-bar-option-text">Cancel</p>
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
                                            2000
                                        </div>
                                    </div>
                                    <div class="unit-box margin-right">
                                        <p class="unit-box-header">
                                            Bags of Cement
                                        </p>
                                        <div class="unit-value">
                                            100
                                        </div>
                                    </div>
                                </div>
                                <p class="deposit">Auto deposit amount <span class="green">
                                            &#8358 50,000.00
                                    </span>
                                </p>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Deposit Frequency
                                    </p>
                                    <div class="unit-value">
                                        Monthly
                                    </div>
                                </div>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Next Deposit Date
                                    </p>
                                    <div class="unit-value">
                                        12-jan-2019
                                    </div>
                                </div>
                            </div>

                            <div class="box-block">
                                <div class="unit-box">
                                    <p class="unit-box-header">
                                        Assigned Card
                                    </p>
                                    <div class="unit-value">
                                        GTBank
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button class="btn">
                            Cash Out
                        </button>

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

                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">1.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                    3,000.00
                                                </span>
                            </div>
                        </div>


                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">2.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                        3,000.00
                                                    </span>
                            </div>
                        </div>


                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">3.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                            3,000.00
                                                        </span>
                            </div>
                        </div>


                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">4.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                                3,000.00
                                                            </span>
                            </div>
                        </div>


                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">5.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                                    3,000.00
                                                                </span>
                            </div>
                        </div>

                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">6.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                                    3,000.00
                                                                </span>
                            </div>
                        </div>

                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">7.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                                    3,000.00
                                                                </span>
                            </div>
                        </div>

                        <div class="plan-group">
                            <div class="detail-container">
                                <p class="tag">S/N :</p>
                                <span class="response">8.</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag">Transaction ID:</p>
                                <span class="response">3456480975657IF</span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Biling Date: </p>
                                <span class="response">14.09.2019<span class="time">00:00</span> </span>
                            </div>
                            <div class="detail-container">
                                <p class="tag"> Amount (&#8358) </p>
                                <span class="response">
                                                                    3,000.00
                                                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="plans-body invoice">
                        <div class="invoice-row invoice-row-header">
                            <div class="left-heading">
                                <p class="additonal-info">Reciept for</p>
                                <h2>Stokkpile</h2>
                                <p class="additional-info">Building your fute house one step at a time</p>
                            </div>
                            <div class="right-heading">
                                <h2>INVOICE</h2>
                            </div>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Transaction ID
                                </p>
                                <p class="value">
                                    34567890973456
                                </p>
                            </div>
                            <hr/>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Billing Date & Time
                                </p>
                                <p class="value">
                                    14.09.2019 01:00pm
                                </p>
                            </div>
                            <hr/>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Card Number
                                </p>
                                <p class="value">
                                    012-xxx-789
                                </p>
                            </div>
                            <hr/>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Block Rate
                                </p>
                                <p class="value">
                                    200
                                </p>
                            </div>
                            <hr/>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Cement Rate
                                </p>
                                <p class="value">
                                    100
                                </p>
                            </div>
                            <hr/>
                        </div>
                        <div class="invoice-row invoice-detail">
                            <div class="exception">
                                <p class="detail">
                                    Amount Deposited
                                </p>
                                <p class="value value-price">
                                    $ 3000
                                </p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            @include('partials.bottom-rates')
        </div>
    </main>
@stop

@section('scripts')
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/viewplan.js')}}"></script>
    <script>
        function deleteMaterial(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this material file!",
                icon: "warning", buttons: true, dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = '{{url('admin/material/delete')}}/' + id
                }
            });
        }
    </script>
@stop


