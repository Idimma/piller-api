@extends('layouts.dashboard')
@section('title', 'Cards')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cards.css')}}">
@endsection
@section('content')
    <div class="main">
        @include('partial.dash-header')
        @include('partials.add-card-modal')
        <div class="cards">
            @foreach($user->cards as $card)
                <div class="card blue">
                    <button class="remove-card">
                        <img src="{{asset('assets/images/delete-card.svg')}}">
                    </button>
                    <div class="remove-card-box">
                        <p class="remove-card-box__header">
                            Remove Card
                        </p>
                        <div class="remove-card-box__description">
                            Kindly note that this card would be removed permanently from this platform.
                        </div>
                        <div class="remove-card__buttons">
                            <button class="remove-card__button">Cancel</button>
                            <a href="{{url('card/remove', $card)}}"
                               class="remove-card__button remove-card__button--bg-purple">
                                Remove
                            </a>
                        </div>
                    </div>
                    <div class="card__brands">
                        <img src="{{asset('assets/images/card-rect.svg')}}">
                        <img src="{{asset('assets/images/master-card-2.svg')}}" alt="">
                    </div>
                    <div class="card__numbers">
                        <span>****</span>
                        <span>****</span>
                        <span>****</span>
                        <span>{{$card->last_four}}</span>
                    </div>
                    <div class="card__details">
                        <div>
                            <p>CARD HOLDER</p>
                            <p>{{$card->account_name}}</p>
                        </div>
                        <div>
                            <p>EXPIRES</p>
                            <p>{{$card->exp_month}}/{{substr($card->exp_year,-2)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <a class="add-card" href='#' onclick="addCard()">
                <img src="{{asset('assets/images/add-purple.svg')}}" alt="">
                Add Card
            </a>
        </div>
    </div>
@stop
@section('scripts')
    <script>

        function addCard() {
            swal({
                title: "Add Card",
                text: "To add and verify your card ₦ 100 will be charged and saved into your plan",
                icon: "info", buttons: true, dangerMode: false,
            }).then((willAdd) => {
                if (willAdd) {
                    window.location.href = "{{url('card/add')}}";
                }
            });

        }
    </script>

    {{--<script src="{{asset('assets/js/no-card.js')}}"></script>--}}
    <script src="{{asset('assets/js/cards.js')}}"></script>
    <script src="{{asset('assets/js/sidenav.js')}}"></script>
    <script src="{{asset('assets/js/Addcard.js')}}"></script>

@stop

{{--        <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Stokkpiler | Cards</title>--}}
{{--    @include('partial.toastAlert')--}}
{{--    --}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}

{{--    @include('partial.sidebar-mobile')--}}
{{--    @include('partial.sidebar')--}}

{{--    <div class="main">--}}
{{--        <div class="cover-overlay"></div>--}}

{{--        @include('partial.dash-header')--}}
{{--        @include('partials.add-card-modal')--}}

{{--        <div class="cards">--}}
{{--            @foreach($user->cards as $card)--}}
{{--                <div class="card blue">--}}
{{--                    <button class="remove-card">--}}
{{--                        <img src="{{asset('assets/images/delete-card.svg')}}">--}}
{{--                    </button>--}}
{{--                    <div class="remove-card-box">--}}
{{--                        <p class="remove-card-box__header">--}}
{{--                            Remove Card--}}
{{--                        </p>--}}
{{--                        <div class="remove-card-box__description">--}}
{{--                            Kindly note that this card would be removed permanently from this platform.--}}
{{--                        </div>--}}
{{--                        <div class="remove-card__buttons">--}}
{{--                            <button class="remove-card__button">Cancel</button>--}}
{{--                            <a href="{{url('card/remove', $card)}}"--}}
{{--                               class="remove-card__button remove-card__button--bg-purple">--}}
{{--                                Remove--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card__brands">--}}
{{--                        <img src="{{asset('assets/images/card-rect.svg')}}">--}}
{{--                        <img src="{{asset('assets/images/master-card-2.svg')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card__numbers">--}}
{{--                        <span>****</span>--}}
{{--                        <span>****</span>--}}
{{--                        <span>****</span>--}}
{{--                        <span>{{$card->last_four}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="card__details">--}}
{{--                        <div>--}}
{{--                            <p>CARD HOLDER</p>--}}
{{--                            <p>{{$card->account_name}}</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <p>EXPIRES</p>--}}
{{--                            <p>{{$card->exp_month}}/{{substr($card->exp_year,-2)}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--            <a class="add-card" href='#' onclick="addCard()">--}}
{{--                <img src="{{asset('assets/images/add-purple.svg')}}" alt="">--}}
{{--                Add Card--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}

{{--    function addCard(){--}}
{{--        swal({--}}
{{--            title: "Add Card",--}}
{{--            text: "To add and verify your card ₦ 100 will be charged and saved into your plan",--}}
{{--            icon: "info", buttons: true, dangerMode: false,--}}
{{--        }).then((willAdd) => {--}}
{{--            if (willAdd	) {--}}
{{--                window.location.href = "{{url('card/add')}}";--}}
{{--            }--}}
{{--        });--}}

{{--    }--}}
{{--</script>--}}

{{--<script src="{{asset('assets/js/no-card.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/cards.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/sidenav.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/Addcard.js')}}"></script>--}}

{{--</body>--}}
{{--</html>--}}
