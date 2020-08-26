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
                        <p class="user-name">{{$customer->name}}</p>
                        <p class="user-email">{{$customer->email}}</p>
                        <p class="user-number">{{$customer->phone}}</p>
                    </div>
                </div>
                <div class="deposited">
                    <p class="deposited__header">Total Amount Deposited</p>
                    <p class="deposited__content">
                        &#8358; {{number_format($customer->transactions->where('type','credit')->sum('amount') , 2)}}</p>
                </div>
                <div class="withdrawn">
                    <p class="withdrawn__header">Materials Withdrawn</p>
                    <div class="withdrawn__content">
                        <div class="units">
                            <p class="withdrawn__content__header">Units of Block</p>
                            <p class="withdrawn__content__value">{{$withdrawn['block']}}</p>
                        </div>
                        <div class="bags">
                            <p class="withdrawn__content__header">Bag of Cement</p>
                            <p class="withdrawn__content__value">{{$withdrawn['cement']}}</p>
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
                @forelse($credits as $cr)
                    <div class="table__row">
                        <span class="table__serial-number">{{$cr->id}}.</span>
                        <span><span class="label">Transaction ID:</span>{{$cr->reference}}</span>
                        <span><span class="label">Billing Date:</span>{{$cr->created_at}}</span>
                        <span><span class="label">Amount (&#8358;):</span>{{number_format($cr->amount,0)}}</span>
                    </div>
                @empty
                    <div style="width: 100%" class=" text-center">
                        <p>{{$customer->name}} has not made any deposit</p>
                    </div>
                @endforelse

            </div>
            <div id="withdrawn" class="table">
                <div class="table__row table__row--header">
                    <span>S/N</span>
                    <span>Transaction ID</span>
                    <span>Withdrawal Materials</span>
                    <span>Withdrawal Date</span>
                </div>
                @forelse($debits as $cr)
                    <div class="table__row">
                        <span class="table__serial-number">{{$cr->id}}.</span>
                        <span><span class="label">Transaction ID:</span>{{$cr->reference}}</span>
                        <span><span class="label">Billing Date:</span>{{$cr->created_at}}</span>
                        <span><span class="label">Amount (&#8358;):</span>{{number_format($cr->amount,0)}}</span>
                    </div>
                @empty
                    <div style="width: 100%" class=" text-center">
                        <p>{{$customer->name}} has not made any withdrawal request</p>
                    </div>
                @endforelse

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
