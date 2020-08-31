@extends('layouts.dashboard')
@section('title', 'Edit Plan')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/editPlan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
@endsection
@section('content')
    <main>
        <div class="main-container">
            @include('partial.dash-header')
            <div class="main-body">
                <div class="overlay">
                    <div class="Add-Card-box">
                        <div class="Add-card-box-header">
                            <h2><span class="underline">ADD</span>CARD</h2>
                            <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
                        </div>
                        <p class="invalid">Invalid Card, Please check if your card has expired</p>
                        <form action="" class="Add-card-box-form">

                            <div class="form-group-full">
                                <div class="form-group-header">
                                    <h2>Name your card</h2>
                                </div>
                                <input type="text" class="form-input-full" placeholder="Gtbank">
                                <p class="additional-info">
                                    Give your card a name to hep when making a transaction.
                                </p>
                            </div>
                            <div class="form-group-full">
                                <div class="form-group-header">
                                    <h2>Name on card</h2>
                                </div>
                                <input type="text" class="form-input-full" placeholder="Samuel Fapoun">
                                <p class="additional-info">
                                    The name written on your Debit Card
                                </p>
                            </div>
                            <div class="form-group-full">
                                <div class="form-group-header">
                                    <h2>Card Number</h2>
                                </div>
                                <input type="text" class="form-input-full credit-card"
                                       placeholder="1234-XXXX-XXXX-XXXX">
                                <p class="additional-info">
                                    The bold number on your Debit Card
                                </p>
                            </div>
                            <div class="form-group-half margin-right">
                                <div class="form-group-header">
                                    <h2>Expiry Date</h2>
                                </div>
                                <input type="date" class="form-input-full" placeholder="MM/YY">
                            </div>
                            <div class="form-group-half">
                                <div class="form-group-header">
                                    <h2>CVV</h2>
                                </div>
                                <input type="text" class="form-input-full cvv" placeholder="...">
                            </div>
                            <button class="btn plans-submit">Add card</button>
                        </form>
                    </div>
                </div>
                <form action="/pages/" method="POST" class="NewPlanForm">
                    <h1 class="planName">Lagos House</h1>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name <span class="Important">
                                    <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input type="text" class="form-input-full" value="Lagos House">
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Deposit frequency <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">Daily</span>

                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    <li class="drop-down-option">Daily</li>
                                    <li class="drop-down-option">Weekly</li>
                                    <li class="drop-down-option">Monthly</li>

                                </ul>
                            </div>
                            <input type="text" class="hidden-input" name="Deposit frequency">
                        </div>
                        <!-- add special type of drop down -->
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Auto Deposit <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt="">
                                </span></h2>
                        </div>
                        <input type="text" class="form-input-full paddingLeft" value="20,000.00">
                        <div class="currencySymbol">
                            $
                        </div>
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Materials <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input type="radio" name="connected" id="Blocks">
                                <label for="Blocks">Blocks only</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" name="connected" id="cement">
                                <label for="cement">Cement only</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" name="connected" id="both">
                                <label for="both">both</label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Stokkpile target <span class="Important">
                                    <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="units-of">
                            <div class="half-groups">
                                <label for="blocks-unit">Unit of Blocks</label>
                                <input type="number" min="1" id="blocks-unit" class="half-input">
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" id="cement-unit" class="half-input">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Status <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt="">
                                </span></h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input type="radio" name="connected" id="active">
                                <label for="Blocks">Active</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" name="connected" id="On hold">
                                <label for="cement">On hold</label>
                            </div>

                            <div class="radio-group">
                                <!-- Leave me alone i'm Important -->
                            </div>

                        </div>
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Next Deposit Date</h2>
                        </div>
                        <input type="date" class="form-input-full">
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Change Debit Card<span class="Important"><img src="" alt=""></span></h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">Add a card</span>
                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    <li class="drop-down-option Add-card-Trigger">Add a card</li>
                                    <li class="drop-down-option">Business</li>

                                </ul>
                            </div>
                            <input type="text" class="hidden-input" name="Card">
                        </div>
                        <!-- add special type of drop down -->
                    </div>

                    <button class="btn plans-submit">Update</button>
                </form>
            </div>
        </div>
    </main>
@stop
@section('scripts')
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
    <script src="{{asset('assets/js/close-img.js')}}"></script>
    <script src="{{asset('assets/js/Addcard.js')}}"></script>
@stop
