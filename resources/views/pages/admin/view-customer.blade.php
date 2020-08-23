<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokkpiler | View Customer</title>
    @include('partial.toastAlert')

    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/view-customer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
</head>
<body>
<div class="container">
    @include('partials.admin-sidebar')
    <div class="main">
        @include('partials.admin-topbar')
        <div class="content">
            <div class="top-cards">
                <div class="user-card">
                    <img src="{{asset('assets/images/user-big.jpg')}}" alt="user picture" class="user-picture">
                    <div class="user-details">
                        <p class="user-name">Alex Smith</p>
                        <p class="user-email">alexsmith@gmail.com</p>
                        <p class="user-number">+2348166341620</p>
                    </div>
                </div>
                <div class="deposited">
                    <p class="deposited__header">Total Amount Deposited</p>
                    <p class="deposited__content">&#8358; 2,000,000</p>
                </div>
                <div class="withdrawn">
                    <p class="withdrawn__header">Materials Withdrawn</p>
                    <div class="withdrawn__content">
                        <div class="units">
                            <p class="withdrawn__content__header">Units of Block</p>
                            <p class="withdrawn__content__value">14,000</p>
                        </div>
                        <div class="bags">
                            <p class="withdrawn__content__header">Bag of Cement</p>
                            <p class="withdrawn__content__value">200</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toggle-bar">
                <button class="toggle-button is-active" data-target="deposited">
                    <span>Deposited</span>
                </button>
                <button class="toggle-button" data-target="withdrawn">
                    <span>Withdrawn</span>
                </button>
            </div>
            <!--TODO Correct this show class using modular CSS-->
            <div id="deposited" class="table show">
                <div class="table__row table__row--header">
                    <span>S/N</span>
                    <span>Transaction ID</span>
                    <span>Billing Date</span>
                    <span>Amount (&#8358;)</span>
                </div>
                <div class="table__row">
                    <span class="table__serial-number">1.</span>
                    <span><span class="label">Transaction ID:</span>345648097657IF</span>
                    <span><span class="label">Billing Date:</span>14.09.2019   00:00</span>
                    <span><span class="label">Amount (&#8358;):</span>3,000.00</span>
                </div>

            </div>
            <div id="withdrawn" class="table">
                <div class="table__row table__row--header">
                    <span>
                        S/N
                    </span>
                    <span>
                        Transaction ID
                    </span>
                    <span>
                        Withdrawal Materials
                    </span>
                    <span>
                        Withdrawal Date
                    </span>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    [...document.querySelectorAll('.toggle-button')].forEach(button => {
        const target = button.dataset.target;
        button.addEventListener('click', () => {
            document.querySelector('.table.show').classList.remove('show');
            document.querySelector(`#${target}`).classList.add('show');
            document.querySelector('.toggle-button.is-active').classList.remove('is-active');
            button.classList.add('is-active')
        })
    })
</script>
<script src="{{asset('assets/js/sidenav.js')}}"></script>
</body>
</html>
