<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partial.toastAlert')

    <link rel="stylesheet" href="{{asset('assets/css/Materials.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <title>Stokkpiler | Materials</title>
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
                        <h2><span class="underline">ADD</span> MATERIAL</h2>
                        <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
                    </div>
                    <form action="{{url('materials')}}" method="post" id="add-material"
                          class="Add-card-box-form Add-material">
                        @csrf
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Material Name</h2>
                            </div>
                            <input name="name" id="name" type="text" class="form-input-full">
                            <input name="method" id="method" hidden class="edit" value="post">
                            <input name="id" id="id" class="edit" hidden>
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
                                <input type="number" id="local" name="local" class="form-input-full">
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
                                <input type="number" id="international" name="international" class="form-input-full">
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="submit" style="margin: 10px auto; width: 50%" class="btn">Add</button>
                        </div>

                    </form>
                </div>
            </div>


            <button class="btn btn__add">
                Add Material
            </button>

            <div class="header__bar">
                <div class="header__bar__name">
                    <h2><span class="border__bottom">MATE</span>RIALS</h2>
                </div>
                <form action="{{url('materials/search')}}" method="post" class="searchbar">
                    @csrf
                    <img src="{{asset('assets/images/ios-search.svg')}}" class="search-image" alt="">
                    <input type="text" name="query" class="searchInput">
                </form>
            </div>


            <div class="plans-body">
                <div class="plan-Header">
                    <div class="detail-container number-col">S/N</div>
                    <div class="detail-container">Material Name</div>
                    <div class="detail-container">Local Rate (&#8358)</div>
                    <div class="detail-container">International Rate ($)</div>
                    <div class="detail-container-actions">

                    </div>
                </div>
                @forelse($materials as $mat)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p>
                            <span class="response">{{$mat->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Material Name:</p>
                            <span class="response">{{$mat->name}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag"> Local Rates (&#8358}: </p>
                            <span class="response">{{number_format($mat->local,2 )}}</span>

                        </div>
                        <div class="detail-container">
                            <p class="tag"> Internationals Rates($): </p>
                            <span class="response">{{number_format($mat->international,2 )}}</span>
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
                    <h3>Empty</h3>
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
                window.location.href = '{{url('material/delete')}}/' + id
            }
        });
    }

    function editMaterial(object) {
        document.getElementById('name').value = object.name;
        document.getElementById('local').value = object.local;
        document.getElementById('method').value = 'patch';
        document.getElementById('id').value = object.id;
        document.getElementById('submit').innerHTML = 'Submit';
        document.getElementById('international').value = object.international;
        addBtn.click()
    }

</script>
</body>
</html>
