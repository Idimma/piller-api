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
             @include('partials.add-card-modal')
                <form action="{{url('plan', $plan)}}" method="POST" class="NewPlanForm">
                    @csrf
                    <h1 class="planName">{{$plan->plan_name}}</h1>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name <span class="Important">
                                    <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input type="text" name="plan_name" class="form-input-full" value="{{$plan->plan_name}}">
                    </div>
                    @if($plan->plan_type === 'normal')
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Deposit frequency <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt=""></span></h2>
                            </div>
                            <div class="special-dropdown">
                                <div class="value-holder">
                                    <span class="Value-text">{{$plan->frequency}}</span>
                                    <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                                </div>
                                <div class="options-holder">
                                    <ul>
                                        <li class="drop-down-option">Daily</li>
                                        <li class="drop-down-option">Weekly</li>
                                        <li class="drop-down-option">Monthly</li>
                                    </ul>
                                </div>
                                <input type="text" value="{{$plan->frequency}}" class="hidden-input"
                                       name="deposit_frequency">
                            </div>
                            <!-- add special type of drop down -->
                        </div>
                    @endif

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Auto Deposit <span class="Important">
                                     <img src="{{asset('assets/images/Reason for saving.svg')}}" alt="">
                                </span></h2>
                        </div>
                        <input type="number" name="deposit" class="form-input-full paddingLeft"
                               value="{{$plan->deposit}}">
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
                                <input {{$plan->material_type === 'block' ?'checked' :''}} type="radio"
                                       name="material_type" value="block" id="Blocks">
                                <label for="Blocks">Blocks only</label>
                            </div>

                            <div class="radio-group">
                                <input {{$plan->material_type === 'cement' ?'checked' :''}}  type="radio"
                                       name="material_type" value="cement" id="cement">
                                <label for="cement">Cement only</label>
                            </div>

                            <div class="radio-group">
                                <input {{$plan->material_type === 'both' ?'checked' :''}} type="radio"
                                       name="material_type" value="both" id="both">
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
                                <input type="number" min="1" value="{{$plan->block_target}}" id="blocks-unit"
                                       class="half-input">
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" value="{{$plan->cement_target}}" id="cement-unit"
                                       class="half-input">
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
                                <input type="radio" {{$plan->plan_status === 'STARTED' ?'checked' :''}}
                                name="status" value="ACTIVE" id="active">
                                <label for="Blocks">Active</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" {{$plan->plan_status === 'ON HOLD' ?'checked' :''}}
                                name="status" value="ON HOLD" id="On hold">
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
                        <input type="date" name="next_deposit_date" value="{{$plan->next_deposit_date}}"
                               class="form-input-full">
                    </div>

                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Change Debit Card<span class="Important"><img src="" alt=""></span></h2>
                        </div>
                        <div class="special-dropdown">
                            <div class="value-holder">
                                <span class="Value-text">{{$plan->card? '****'. $plan->card->last_four :' Add a Card'}}</span>
                                <img src="{{asset('assets/images/dropDown.svg')}}" alt="">
                            </div>
                            <div class="options-holder">
                                <ul>
                                    @foreach( $user->cards as $card)
                                        <li class="drop-down-option">**** {{$card->last_four}}</li>
                                    @endforeach
{{--                                    <li class="drop-down-option Add-card-Trigger">Add a card</li>--}}

                                </ul>
                            </div>
                            <input type="text" value="{{$plan->card_id}}" name="card_id" class="hidden-input">
                        </div>
                        <!-- add special type of drop down -->
                    </div>

                    <button type="submit" class="btn plans-submit">Update</button>
                </form>
            </div>
        </div>
    </main>
@stop
@section('scripts')
    <script src="{{asset('assets/js/no-plans.js')}}"></script>
    <script src="{{asset('assets/js/no-card.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
    <script src="{{asset('assets/js/close-img.js')}}"></script>
    <script src="{{asset('assets/js/Addcard.js')}}"></script>
@stop
