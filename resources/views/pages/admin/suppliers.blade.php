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
                    <form action="{{url('admin/suppliers')}}" method="post" class="Add-card-box-form Add-material">
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Supplier Name</h2>
                            </div>
                            @csrf
                            <input name="id" id="id" class="edit" hidden>
                            <input name="name" id="name" type="text" class="form-input-full">
                        </div>
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Local Rates</h2>
                            </div>
                            <div class="currency__input__div">
                                <div class="currencyHolder">
                                    &#8358;
                                    <img src="{{asset('assets/images/arrow%20down.svg')}}" alt="">
                                </div>
                                <input name="local" id="local" type="number" min="1" class="form-input-full">
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
                                <input name="international" id="international" type="number" min="1"
                                       class="form-input-full">
                            </div>
                        </div>
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Address</h2>
                            </div>
                            <input type="text" name="address" id="address" class="form-input-full">
                        </div>
                        <div class="form-group-3">
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>City</h2>
                                </div>
                                <input name="city" id="city" type="text" class="form-input-full">
                            </div>
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>State</h2>
                                </div>
                                <input type="text" name="state" id="state" class="form-input-full">
                            </div>
                            <div class="form-group-full third">
                                <div class="form-group-header">
                                    <h2>Country</h2>
                                </div>
                                <input type="text" name="country" row="5" id="country" class="form-input-full">
                            </div>
                        </div>

                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Note</h2>
                            </div>
                            <textarea type="text" name="note" id="note" class="form-input-full"></textarea>
                        </div>

                        <button id="submit" type="submit" class="btn">Add</button>
                    </form>
                </div>
            </div>


            <button id="addSupplier" class="btn btn__add">
                Add Supplier
            </button>

            <div class="header__bar">
                <div class="header__bar__name">
                    <h2><span class="border__bottom">SUPP</span>LIERS</h2>
                </div>
                <form action="{{url('admin/suppliers/search')}}" method="post" class="searchbar">
                    @csrf
                    <img src="{{asset('assets/images/ios-search.svg')}}" class="search-image" alt="">
                    <input type="text" name="search" class="searchInput">
                </form>
            </div>


            <div class="plans-body">
                <div class="plan-Header">
                    <div class="detail-container number-col">S/N</div>
                    <div class="detail-container">Supplier Name</div>
                    <div class="detail-container">Note</div>
                    <div class="detail-container">Location Details</div>
                    <div class="detail-container">Rate</div>
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
                            <p class="tag">Supplier Name:</p>
                            <span class="response">{{$mat->name}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Notes:</p>
                            <span class="response">{{$mat->note}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Location Detail:</p>
                            <span class="response">{{$mat->address}},<br/>{{$mat->city}}, {{$mat->state}}
                                <br />{{$mat->country}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Rates: </p>
                            <span class="response">
                                (&#8358) {{number_format($mat->local,2 )}}<br/>($) {{number_format($mat->local,2 )}}
                            </span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Start Date: </p>
                            <span class="response">{{$mat->created_at}}</span>
                        </div>
                        <div class="detail-container-actions">
                            <a href="#" onclick="editMaterial({{$mat}})">
                                <img src="{{asset('assets/images/ios-create.svg')}}" alt="">
                            </a>
                            <a href="#" onclick="deleteMaterial({{$mat->id}})">
                                <img src="{{asset('assets/images/ios-trash.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center fs-24">Empty</h3>
                @endforelse
            </div>
        </div>


    </div>
</main>

<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/withdraw.js')}}"></script>
<script src="{{asset('assets/js/close-img.js')}}"></script>
<script>
    function deleteMaterial(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this material file!",
            icon: "warning", buttons: true, dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = '{{url('admin/supplier/delete')}}/' + id
            }
        });
    }

    function editMaterial(object) {
        document.getElementById('name').value = object.name;
        document.getElementById('local').value = object.local;
        document.getElementById('city').value = object.city;
        document.getElementById('address').value = object.address;
        document.getElementById('state').value = object.state;
        document.getElementById('country').value = object.country;
        document.getElementById('note').value = object.note;
        document.getElementById('id').value = object.id;
        document.getElementById('submit').innerHTML = 'Submit';
        document.getElementById('international').value = object.international;
        document.getElementById('addSupplier').click()
    }
</script>
</body>
</html>
