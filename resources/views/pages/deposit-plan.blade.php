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
                            <h2><span class="underline">ADD</span>CARD</h2>
                            <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
                        </div>
                        <p class="invalid">Invalid Card, Please check if your card has expired</p>
                        <form action="{{url('card')}}" method="post" class="Add-card-box-form">
                            @csrf
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
                                <input type="text" class="form-input-full credit-card" placeholder="1234-XXXX-XXXX-XXXX"
                                       maxlength="19">
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
                <form action="{{url('plan')}}" method="POST" class="NewPlanForm normal-deposit-form show-form">
                    @csrf
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input name="plan_name" type="text" class="form-input-full">
                        <p class="input-detail">Kindly give your plan a name</p>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose building type<span class="Important"><img src="" alt=""></span></h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">Choose building type</span>
                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    @forelse($buildings as $b)
                                        <li class="drop-down-option">{{$b->title}}</li>
                                    @empty
                                        <li class="drop-down-option">2 Bedroom Bungalow</li>
                                        <li class="drop-down-option">Student's Hostel Bungalow</li>
                                        <li class="drop-down-option">2 Bedroom Double Flats</li>
                                    @endforelse
                                </ul>
                            </div>
                            <input type="text" class="hidden-input" name="building_type">
                        </div>
                        <p class="input-detail">Kindly select a building plan</p>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Estimation of materials needed</h2>
                        </div>
                        <input disabled type="text" class="form-input-full" id="estimation" name="material_estimation"
                               placeholder="1000 Units of Blocks, 100 Bags of Cement">
                    </div>
                    @if($plan_type === 'normal')
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Deposit frequency <span class="Important"><img
                                                src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span>
                                </h2>
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
                                <input type="text" class="hidden-input" value="Daily" name="deposit_frequency">
                            </div>
                            <p class="input-detail">Select how often you want to make a deposit</p>
                            <!-- add special type of drop down -->
                        </div>

                    @endif
                    <input hidden name="plan_status" value="PENDING">
                    <input hidden name="plan_type" value="{{$plan_type}}">
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Materials <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input value="blocks" type="radio" name="material_type" id="Blocks">
                                <label for="Blocks">Blocks only</label>
                            </div>

                            <div class="radio-group">
                                <input value="cement" type="radio" name="material_type" id="cement">
                                <label for="cement">Cement only</label>
                            </div>
                            <div class="radio-group">
                                <input value="both" type="radio" name="material_type" id="both">
                                <label for="both">both</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Stokkpile target <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="units-of">
                            <div class="half-groups">
                                <label for="blocks-unit">Unit of Blocks</label>
                                <input type="number" min="1" name="block_target" id="blocks-unit" class="half-input">
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" name="cement_target" id="cement-unit" class="half-input">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Set priority for Building Materials <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
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
                                <input name="block_percent" type="range" min="0" max="100" value=0 class="slider"
                                       id="myRange">
                            </div>
                            <div class="bottom-slider">
                                <span class="left">units of blocks</span>
                                <span class="right">units of cement</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>When is your start date? <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <input type="date" name="start_date" class="form-input-full">
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Stockpile Country <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
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
                                    <li class="drop-down-option">US</li>
                                    <li class="drop-down-option">Britain</li>
                                    <li class="drop-down-option">Others</li>
                                </ul>
                            </div>
                            <input type="text" class="hidden-input" onchange="selectCurrency(this)" value="Nigeria"
                                   name="country">

                        </div>
                        <p class="input-detail">Kindly choose a Stokkpile country</p>
                        <!-- add special type of drop down -->
                    </div>

                    {{--                    <div class="form-group-full">--}}
                    {{--                        <div class="form-group-header">--}}
                    {{--                            <h2>Select Card <span class="Important"><img--}}
                    {{--                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="special-dropdown">--}}
                    {{--                            <div class="value-holder">--}}
                    {{--                                <span class="Value-text">Add a card</span>--}}

                    {{--                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="options-holder">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li class="drop-down-option Add-card-Trigger">Add a card</li>--}}
                    {{--                                    <li class="drop-down-option">Business</li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                            <input type="text" class="hidden-input" name="Card">--}}
                    {{--                            <p class="input-detail">Kindly choose a pre-registered Debit Card</p>--}}
                    {{--                        </div>--}}
                    {{--                        <!-- add special type of drop down -->--}}
                    {{--                    </div>--}}

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Auto Deposit <span class="Important"><img
                                            src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                        </div>
                        <div class="wierdDiv">
                            <div id="currency" class="currencySymbol text-center">
                                {{currency()}}
                            </div>
                            <input type="number" name="deposit" style="flex: auto"
                                   class="form-input-full  right-radius wierdInput">
                        </div>
                        <p class="input-detail">The amount you want to deposit according to your deposit frequency</p>
                    </div>
                    <button class="btn plans-submit">Save</button>
                </form>

            </div>
            @include('partials.bottom-rates')
        </div>
    </main>
@stop
@section('scripts')
    <script>
        function getBuildingTypes() {
            return  {!! \App\Building::get()->toJson() !!}
        }
    </script>
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
    <script src="{{asset('assets/js/close-img.js')}}"></script>

@stop


