@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/transactions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
@endsection
@section('content')
    <div class="main">
        @include('partial.dash-header')
        <div class="content">
            <div class="cards">
                <div class="total-amount mobile-90">
                    <p class="header">Total Amount Deposited</p>
                    <span class="line-h"></span>
                    <p class="bold">N{{number_format($total, 2)}}</p>
                </div>
                <div class="materials-withdrawn mobile-90">
                    <p class="header">Materials Withdrawn</p>
                    <span class="line-h"></span>
                    <div class="grid">
                        <div>
                            <p class="light">Units of Block</p>
                            <p class="bold">{{number_format($withdrawn['block'], 2)}}</p>
                        </div>
                        <div>
                            <p class="light">Bags of cement</p>
                            <p class="bold">{{number_format($withdrawn['cement'], 2)}}</p>
                        </div>
                    </div>
                </div>
                <div class="materials-left mobile-90">
                    <p class="header">Materials Left</p>
                    <span class="line-h"></span>
                    <div class="grid">
                        <div>
                            <p class="light">Units of Block</p>
                            <p class="bold">{{number_format($credits->sum('block'), 2)}}</p>
                        </div>
                        <div>
                            <p class="light">Bags of cement</p>
                            <p class="bold">{{number_format($credits->sum('cement'), 2)}}</p>
                        </div>
                    </div>
                </div>
                <a href="{{url('no-plan')}}" class="add-plan mobile-90">
                    <button style="padding-bottom: 10px"><img src="{{asset('assets/images/ios-add.svg')}}"></button>
                    <p>Create a deposit plan</p>
                </a>
            </div>
            <div class="download-pdf mobile-90">
                    <span>
                        RECENT TRANSACTIONS
                        <span class="line"></span>
                    </span>
                <button>Download (PDF)</button>
            </div>
            <div class="transactions mobile-90">
                <div class="transactions__header">
                    <p>Billing Date</p>
                    <p>Transaction ID</p>
                    <p>Materials Withdrawn</p>
                    <p>Amount</p>
                    <p>Status</p>
                </div>
                <p class="transactions__header__small">
                    TRANSACTIONS
                </p>

                @forelse ($user->transactions as $tran)
                    <div class="transaction {{$tran->type ==='credit' ? 'deposit' :'withdraw'}}">
                        <p><span class="label">Billing Date:</span> {{$tran->created_at}}</p>
                        <p class="mobile-overflow"><span class="label">Transaction ID:</span> {{$tran->reference}}</p>
                        <p><span class="label">Materials Withdrawn:</span> {!! $tran->type ==='debit'?
                        "<span>
                                $tran->cement Bags of cement
                                <span class='br'></span>
                                  $tran->block Units of Blocks
                            </span>"
                        :'-'
                        !!}</p>
                        <p><span class="label">Amount:</span> N {{$tran->type ==='credit' ?  nf($tran->amount) : '-'}}</p>
                        <p><span class="label">Status:</span> {{$tran->type ==='credit' ? 'Paid' :'Debit'}}</p>
                    </div>
                    @empty
                        <h3>No Transaction Found</h3>
                    @endforelse
            </div>
            @include('partials.bottom-rate2')
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('assets/js/sidenav.js')}}"></script>
@stop


