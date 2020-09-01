@extends('layouts.dashboard')
@section('title', 'Home')
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
                <div class="steps-row">
                    <div class="step-group type-1">
                        <div class="step-card yellow">
                            <h2>Step 1</h2>
                            <p>
                                Click on the <span class="emphasis">Add New Plan Button</span>
                            </p>

                            <a href="{{url('no-plan')}}" class="btn-link">
                                Add new plan
                            </a>

                        </div>
                        <div class="directional-arrow">
                            <img src="{{asset('assets/images/Group 94.svg')}}" alt="" class="point-forward forwards">
                            <img src="{{asset('assets/images/Group 96.svg')}}" alt="" class="point-downawrd down">

                        </div>
                    </div>
                    <div class="step-group type-1">
                        <div class="step-card pink">
                            <h2>Step 2</h2>
                            <p>
                                Fill the form for the new plan
                            </p>

                        </div>
                        <div class="directional-arrow">
                            <img src="{{asset('assets/images/Group 94.svg')}}" alt="" class="point-backwards forwards">
                            <img src="{{asset('assets/images/Group 96.svg')}}" alt="" class="point-downawrd down">
                        </div>
                    </div>
                    <div class="step-group type-2">
                        <div class="step-card blue">
                            <h2>Step 3</h2>
                            <p>
                                Add a valid debit card before you finish filling the new plan form.
                            </p>
                        </div>
                        <div class="directional-arrow">
                            <img src="{{asset('assets/images/Group 96.svg')}}" alt="" class="point-downawrd">
                        </div>
                    </div>
                </div>
                <div class="steps-row reverse">
                    <div class="step-group type-3">
                        <div class="step-card purple">
                            <h2>Step 6</h2>
                            <p>
                                Enjoying the depositing ride to withdraw building materials in the future.
                            </p>
                        </div>
                        <div class="directional-arrow six">
                            <img src="{{asset('assets/images/Group 95.svg')}}" alt="" class="point-backwards forwards">
                            <img src="{{asset('assets/images/Group 96.svg')}}" alt="" class="point-downawrd down">
                        </div>
                    </div>
                    <div class="step-group type-3">
                        <div class="step-card cyan">
                            <h2>Step 5</h2>
                            <p>
                                Check our dashboard to see you updated plan
                            </p>

                            <a href="{{url('dashboard')}}" class="btn-link">
                                Dashboard
                            </a>

                        </div>
                        <div class="directional-arrow">
                            <img src="{{asset('assets/images/Group 95.svg')}}" alt="" class="point-backwards forwards">
                        </div>
                    </div>
                    <div class="step-group type-2">
                        <div class="step-card green">
                            <h2>Step 4</h2>
                            <p>
                                Submit the form
                            </p>
                        </div>
                        <div class="directional-arrow">
                            <img src="{{asset('assets/images/Group 96.svg')}}" alt="" class="point-backwards down">
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
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
@stop

