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
                <div class="searchbar">
                    <img src="../../assets/images/ios-search.svg" class="search-image" alt="">
                    <input type="text" class="searchInput">
                </div>
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


                <div class="plan-group">
                    <div class="detail-container number-col">
                        <p class="tag">S/N :</p><span class="response">1</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Transaction ID</p><span class="response">12343234567897AS</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Billing Date </p><span class="response">14.09.2019 00:00</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Withdrawn Materials </p>
                        <span class="response">100 Blocks, 12 Cement Bags</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Amount </p>
                        <span class="response">3000.00</span>
                    </div>
                </div>
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


                <div class="plan-group">
                    <div class="detail-container number-col">
                        <p class="tag">S/N :</p>
                        <span class="response">1</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Transaction ID</p>
                        <span class="response">12343234567897AS</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Billing Date </p>
                        <span class="response">14.09.2019 00:00</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Amount </p>
                        <span class="response">3000.00</span>
                    </div>
                </div>


                <div class="plan-group">
                    <div class="detail-container number-col">
                        <p class="tag">S/N :</p>
                        <span class="response">2</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Transaction ID</p>
                        <span class="response">12343234567897AS</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Billing Date </p>
                        <span class="response">14.09.2019 00:00</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Amount </p>
                        <span class="response">
                                            3000.00
                                        </span>
                    </div>
                </div>
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


                <div class="plan-group">
                    <div class="detail-container number-col">
                        <p class="tag">S/N :</p>
                        <span class="response">1</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Transaction ID</p>
                        <span class="response">12343234567897AS</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Withdrawn Materials </p>
                        <span class="response">
                                            100 Blocks, 12 Cement Bags
                                        </span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Withdrawal Date </p>
                        <span class="response">14.09.2019 00:00</span>
                    </div>
                </div>


                <div class="plan-group">
                    <div class="detail-container number-col">
                        <p class="tag">S/N :</p>
                        <span class="response">2</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Transaction ID</p>
                        <span class="response">12343234567897AS</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Withdrawn Materials </p>
                        <span class="response">
                                            100 Blocks, 12 Cement Bags
                                        </span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Withdrawal Date </p>
                        <span class="response">14.09.2019 00:00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/history.js')}}"></script>
<script src="{{asset('assets/js/close-img.js')}}"></script>


</body>
</html>
