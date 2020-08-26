@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/transactions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
@endsection
@section('content')
    <div class="main">
        @include('partials.admin-topbar')
        <div class="content">
            <div class="cards">
                <div class="total-amount">
                    <p class="header">Total Amount Deposited</p>
                    <span class="line-h"></span>
                    <p class="bold">N{{number_format($total, 2)}}</p>
                </div>
                <div class="materials-withdrawn">
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
                <div class="materials-left">
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
                <a href="{{url('no-plan')}}" class="add-plan">
                    <button style="padding-bottom: 10px"><img src="{{asset('assets/images/ios-add.svg')}}"></button>
                    <p>Create a deposit plan</p>
                </a>
            </div>
            <div class="download-pdf">
                    <span>
                        RECENT TRANSACTIONS
                        <span class="line"></span>
                    </span>
                <button>Download (PDF)</button>
            </div>
            <div class="transactions">
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


                <div class="transaction deposit">
                    <p><span class="label">Billing Date:</span> 14.09.2019 00:00</p>
                    <p><span class="label">Transaction ID:</span> 345648097657IF</p>
                    <p><span class="label">Materials Withdrawn:</span>- </p>
                    <p><span class="label">Amount:</span> N2,000.00</p>
                    <p><span class="label">Status:</span> Paid</p>
                </div>

                <div class="transaction withdraw">
                    <p><span class="label">Billing Date</span> 14.09.2019 00:00</p>
                    <p><span class="label">Transaction ID</span> 345648097657IF</p>
                    <p>
                        <span class="label">Materials Withdrawn:</span>
                        <span>
                                100 Bags of cement
                                <span class="br"></span>
                                7,000 Units of Blocks
                            </span>
                    </p>
                    <p><span class="label">Amount:</span> -</p>
                    <p><span class="label">Status:</span> Debit</p>
                </div>
            </div>
            @include('partials.bottom-rate2')
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('assets/js/sidenav.js')}}"></script>
@stop


