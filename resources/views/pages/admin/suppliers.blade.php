<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partial.toastAlert')
    <link rel="stylesheet" href="{{asset('assets/css/Materials.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <title>Stokkpiler | Suppliers</title>
</head>
<body>
@include('partials.admin-sidebar')
<div class="cover-overlay"></div>
<main>
    <div class="main-container">
        @include('partials.admin-topbar')

        <div class="main-body">

            <div class="overlay">
                <div class="Add-Card-box">
                    <div class="Add-card-box-header">
                        <h2><span class="border__bottom">ADD</span> SUPPLIERS </h2>
                        <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
                    </div>
                    <form action="{{url('suppliers')}}" class="Add-card-box-form Add-material">
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Material Name</h2>
                            </div>
                            <input type="text" class="form-input-full">
                        </div>
                        <div class="form-group-full">hp
                            <div class="form-group-header">
                                <h2>Local Rates</h2>
                            </div>
                            <div class="currency__input__div">
                                <div class="currencyHolder">
                                    &#8358;
                                    <img src="{{asset('assets/images/arrow%20down.svg')}}" alt="">
                                </div>
                                <input type="number" min="1" class="form-input-full">
                            </div>
                        </div>

                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>International Rates</h2>
                            </div>
                            <div class="currency__input__div">
                                <div class="currencyHolder">
                                    $
                                    <img src="{{asset('assets/images/arrow%20down.svg')}}" alt="">
                                </div>
                                <input type="number" min="1" class="form-input-full">
                            </div>
                        </div>
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Address</h2>
                            </div>
                            <input type="text" class="form-input-full">
                        </div>
                        <div class="form-group-3">
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>City</h2>
                                </div>
                                <input type="text" class="form-input-full">
                            </div>
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>State</h2>
                                </div>
                                <input type="text" class="form-input-full">
                            </div>
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>Country</h2>
                                </div>
                                <input type="text" class="form-input-full">
                            </div>
                        </div>

                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>City</h2>
                            </div>
                            <input type="text" class="form-input-full">
                        </div>

                        <button class="btn">Add</button>
                    </form>
                </div>
            </div>


            <button class="btn btn__add">
                Add Supplier
            </button>

            <div class="header__bar">
                <div class="header__bar__name">
                    <h2><span class="border__bottom">SUPP</span>LIERS</h2>
                </div>
                <div class="searchbar">
                    <img src="{{asset('assets/images/ios-search.svg')}}" class="search-image" alt="">
                    <input type="text" class="searchInput">
                </div>
            </div>


            <div class="plans-body">
                <div class="plan-Header">
                    <div class="detail-container number-col">S/N</div>
                    <div class="detail-container">Supplier Name</div>
                    <div class="detail-container">List of Materials</div>
                    <div class="detail-container">Country</div>
                    <div class="detail-container">Start Date</div>
                    <div class="detail-container-actions"></div>
                </div>

                @forelse($suppliers as $mat)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p>
                            <span class="response">{{$mat->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">List of materials:</p>
                            <span class="response">{{$mat->name}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Supplier Name:</p>
                            <span class="response">{{$mat->name}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Country:</p>
                            <span class="response">{{$mat->country}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Local Rates (&#8358}: </p>
                            <span class="response">{{number_format($mat->local,2 )}}</span>

                        </div>
                        <div class="detail-container">
                            <p class="tag"> Internationals Rates($): </p>
                            <span class="response">{{number_format($mat->international,2 )}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Start Date: </p>
                            <span class="response">{{$mat->created_at}}</span>
                        </div>
                        <div class="detail-container-actions">
                            <a href="{{url('edit-plan', $mat)}}">
                                <img src="{{asset('assets/images/ios-create.svg')}}" alt="">
                            </a>
                            <a href="{{url('view-plan', $mat)}}">
                                <img src="{{asset('assets/images/ios-trash.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                @empty
                    <h3>Empty</h3>
                @endforelse
            </div>
        </div>


    </div>
</main>

<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/withdraw.js')}}"></script>
<script src="{{asset('assets/js/close-img.js')}}"></script>

</body>
</html>
