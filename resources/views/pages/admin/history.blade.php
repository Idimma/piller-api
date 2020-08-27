<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partial.toastAlert')

    <link rel="stylesheet" href="{{asset('assets/css/Materials.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <title>Stokkpiler | History</title>
</head>
<body>
@include('partials.admin-sidebar')

<div class="cover-overlay"></div>

<main>


    <div class="main-container">
        @include('partials.admin-topbar')
        <div class="main-body">
            <div class="header__bar">
                <div class="header__bar--optionHolder">
                    <div class="header--option header--option-active" data-type="all">
                        <h2>All</h2>
                        <div class="bottom--bar"></div>
                    </div>
                    <div class="header--option" data-type="deposited">
                        <h2>Deposited</h2>
                        <div class="bottom--bar"></div>
                    </div>
                    <div class="header--option" data-type="withdrawn">
                        <h2>Withdrawn</h2>
                        <div class="bottom--bar"></div>
                    </div>
                </div>
                <form action="{{url('admin/history/search')}}" method="post" class="searchbar">
                    @csrf
                    <img src="{{asset('assets/images/ios-search.svg')}}" class="search-image" alt="">
                    <input type="text" name="search" class="searchInput">
                </form>
            </div>


            <!-- The list containing all the plans  -->

            <div class="plans-body listHidden showList" data-type="all">
                <div class="plan-Header">
                    <div class="detail-container number-col">S/N</div>
                    <div class="detail-container">Transaction ID</div>
                    <div class="detail-container">Billing Date</div>
                    <div class="detail-container">Withdrawn Materials</div>
                    <div class="detail-container">Amount</div>
                </div>

                @forelse($all as $cr)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p><span class="response">{{$cr->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Transaction ID</p><span class="response">{{$cr->reference}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Billing Date </p><span class="response">{{$cr->created_at}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Withdrawn Materials </p><span class="response">{{$cr->block}} Blocks, {{$cr->cement}} Cement Bags</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Amount </p><span class="response">{{$cr->amount}}</span>
                        </div>
                    </div>
                @empty
                    <div style="width: 100%" class=" text-center">
                        <p>No request has been made </p>
                    </div>
                @endforelse

            </div>


            <!-- The list containing all the DEPOSITS  -->

            <div class="plans-body listHidden" data-type="deposited">
                <div class="plan-Header">
                    <div class="detail-container number-col">
                        S/N
                    </div>
                    <div class="detail-container">
                        Transaction ID
                    </div>
                    <div class="detail-container">
                        Billing Date
                    </div>
                    <div class="detail-container">
                        Amount
                    </div>
                </div>


                @forelse($credits as $cr)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p><span class="response">{{$cr->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Transaction ID</p><span class="response">{{$cr->reference}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Billing Date </p><span class="response">{{$cr->created_at}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Withdrawn Materials </p><span class="response">{{$cr->block}} Blocks, {{$cr->cement}} Cement Bags</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Amount </p><span class="response">{{$cr->amount}}</span>
                        </div>
                    </div>
                @empty
                    <div style="width: 100%" class=" text-center">
                        <p>No Deposit request has been made </p>
                    </div>
                @endforelse

            </div>


            <!-- The list containing all the Withdrawals  -->

            <div class="plans-body listHidden" data-type="withdrawn">
                <div class="plan-Header">
                    <div class="detail-container number-col">
                        S/N
                    </div>
                    <div class="detail-container">
                        Transaction ID
                    </div>
                    <div class="detail-container">
                        Withdrawn Materials
                    </div>
                    <div class="detail-container">
                        Withdrawal Date
                    </div>
                </div>

                @forelse($debits as $cr)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p><span class="response">{{$cr->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Transaction ID</p><span class="response">{{$cr->reference}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Billing Date </p><span class="response">{{$cr->created_at}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Withdrawn Materials </p><span class="response">{{$cr->block}} Blocks, {{$cr->cement}} Cement Bags</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Amount </p><span class="response">{{$cr->amount}}</span>
                        </div>
                    </div>
                @empty
                    <div style="width: 100%" class=" text-center">
                        <p>No withdrawal request has been made </p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</main>


<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/history.js')}}"></script>
<script src="{{asset('assets/js/close-img.js')}}"></script>


</body>
</html>
