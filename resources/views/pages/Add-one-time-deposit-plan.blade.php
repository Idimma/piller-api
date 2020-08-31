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
                <div class="overlay">
                    <div class="Add-Card-box">
                        <div class="Add-card-box-header">
                            <h2> <span class="underline">ADD</span>CARD</h2>
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
                                <input type="text" class="form-input-full credit-card" placeholder="1234-XXXX-XXXX-XXXX">
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
                <!-- one time deposit form -->

                <form action="/pages/" method="POST" class="NewPlanForm one-time-deposit-form show-form">
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input type="text" class="form-input-full">
                        <!-- <div class="check-box">
                            <input type="checkbox" name="ckeck2" id="check">
                            <label for="check">Click here for one time deposits</label>
                        </div> -->
                        <p class="input-detail">Kindly give your plan a name</p>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose building type<span class="Important"><img src="" alt=""></span> </h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">Choose building type</span>
                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    <li class="drop-down-option">Building Type 1</li>
                                    <li class="drop-down-option">Building Type 2</li>
                                    <li class="drop-down-option">Building Type 3</li>
                                </ul>
                            </div>
                            <input type="text" class="hidden-input" name="Card">
                            <p class="input-detail">Kindly select a building type</p>
                        </div>
                        <!-- add special type of drop down -->
                    </div>


                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Estimation of materials needed</h2>
                        </div>
                        <input type="text" class="form-input-full" placeholder="1000 Units of Blocks, 100 Bags of Cement">
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Materials   <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
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
                            <h2>Stokkpile target  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                        </div>
                        <div class="units-of">
                            <div class="half-groups">
                                <label for="blocks-unit">Unit of Blocks</label>
                                <input type="number" min="1" id="blocks-unit" class="half-input" >
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" id="cement-unit" class="half-input">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Set priority for Building Materials  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                        </div>
                        <div class="slideContainer">
                            <div class="top-slider">
                                    <span class="current">
                                        0%
                                    </span>
                                <span class="negative">
                                        100%
                                    </span>
                            </div>
                            <div class="sliderContainerInner">
                                <div class="sliderBackground"></div>
                                <input type="range" min="0" max="100" value=0 class="slider" id="myRange">
                            </div>
                            <div class="bottom-slider">
                                <span class="left">units of blocks</span>
                                <span class="right">units of cement</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>When is your start date?  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                        </div>
                        <input type="date" class="form-input-full">
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Stockpile Country  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">Nigeria</span>

                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    <li class="drop-down-option">Nigeria</li>
                                    <li class="drop-down-option">Ghana</li>
                                    <li class="drop-down-option">Kenya</li>

                                </ul>
                            </div>
                            <input type="text" class="hidden-input" name="stockpile-Country">
                            <p class="input-detail">Kindly give your plan a name</p>
                        </div>
                        <!-- add special type of drop down -->
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Select Card  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
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
                            <p class="input-detail">Kindly choose a  pre-registered Debit Card</p>
                        </div>
                        <!-- add special type of drop down -->
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Auto Deposit  <span class="Important"><img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span> </h2>
                        </div>
                        <div class="wierdDiv">
                            <div class="currencySymbol">
                                $
                            </div>
                            <input type="text" class="form-input-full wierdInput">
                        </div>
                    </div>

                    <button class="btn plans-submit">Save</button>
                </form>


            </div>
            @include('partials.bottom-rates')
        </div>
    </main>
@stop
@section('scripts')
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
    <script src="{{asset('assets/js/Addcard.js')}}"></script>
    <script src="{{asset('assets/js/close-img.js')}}"></script>
@stop
