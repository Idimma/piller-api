<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/plan.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <title>Stokkpiler | Plans</title>
</head>
<body>


@include('partial.sidebar-mobile')
@include('partial.sidebar')
<div class="cover-overlay"></div>
<main>
    <div class="main-container">
        @include('partials.admin-topbar')

        <div class="main-body">
            <div class="header-bar">
                <h2><span class="underline">My p</span>lans</h2>
                <a href="{{url('no-plan')}}" class="new-plan">
                    <img src="{{asset('assets/images/add-purple.svg')}}" alt="">
                    <span class="">New plan</span>
                </a>
            </div>


            <div class="plans-body">
                <div class="plan-Header">
                    <div class="detail-container">S/N</div>
                    <div class="detail-container">Name</div>
                    <div class="detail-container">Auto Deposits {&#8358}</div>
                    <div class="detail-container">List Of Properties</div>
                    <div class="detail-container">Start Date</div>
                    <div class="detail-container">Next Deposit Date</div>
                    <div class="detail-container-actions"></div>
                </div>

                <div class="plan-group">
                    <div class="detail-container">
                        <p class="tag">S/N :</p><span class="response">1</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Name:</p><span class="response">Lagos House</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">Auto Deposits {&#8358}: </p><span class="response">50,000.00</span>
                    </div>
                    <div class="detail-container">
                        <p class="tag">List Of Properties: </p>
                        <span class="response">
                            <p>100 units of blocks</p>
                            <p>50 bags of Cement</p>
                        </span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Start Date: </p>
                        <span class="response">
                            12-jan-2019
                        </span>
                    </div>
                    <div class="detail-container">
                        <p class="tag"> Next Deposit Date: </p>
                        <span class="response">
                            12-jan-2019
                        </span>
                    </div>
                    <div class="detail-container-actions">
                        <a href="{{url('plan/edit')}}">
                            <img src="{{asset('assets/images/ios-create.svg')}}" alt="">
                        </a>
                        <a href="{{url('plan')}}">
                            <img src="{{asset('assets/images/eye.svg')}}" alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('partials.bottom-rates')
</main>
<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/Required-inputs.js')}}"></script>
</body>
</html>
