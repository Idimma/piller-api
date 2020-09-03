<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partial.toastAlert')

    <link rel="stylesheet" href="{{asset('assets/css/Materials.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
    <title>Stokkpiler | Building Types</title>
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
                    <form action="{{url('admin/building')}}" method="post" id="add-material"
                          class="Add-card-box-form Add-material">
                        @csrf
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Building Type Title</h2>
                            </div>
                            <input name="title" id="title" type="text" class="form-input-full">
                            <input name="id" id="id" class="edit" hidden>
                        </div>
                        <div class="form-group-full">
                            <div class="form-group-header">
                                <h2>Building Type Description</h2>
                            </div>

                            <textarea id="description" name="description" rows="5"
                                      class="form-input-full"></textarea>
                        </div>

                        <div>
                            <button type="submit" id="submit" style="margin: 10px auto; width: 50%" class="btn">Add
                            </button>
                        </div>

                    </form>
                </div>
            </div>


            <button class="btn btn__add">
                Add Building Type
            </button>

            <div class="header__bar">
                <div class="header__bar__name">
                    <h2><span class="border__bottom">BUILD</span>ING TYPES</h2>
                </div>
                <form action="{{url('admin/building/search')}}" method="post" class="searchbar">
                    @csrf
                    <img src="{{asset('assets/images/ios-search.svg')}}" class="search-image" alt="">
                    <input type="text" name="search" class="searchInput">
                </form>
            </div>


            <div class="plans-body">
                <div class="plan-Header">
                    <div class="detail-container number-col">S/N</div>
                    <div class="detail-container">Title</div>
                    <div class="detail-container">Description</div>
                    <div class="detail-container-actions"></div>
                </div>
                @forelse($buildings as $mat)
                    <div class="plan-group">
                        <div class="detail-container number-col">
                            <p class="tag">S/N :</p>
                            <span class="response">{{$mat->id}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Title:</p>
                            <span class="response">{{$mat->title}}</span>
                        </div>
                        <div class="detail-container">
                            <p class="tag">Description: </p>
                            <span class="response">{{$mat->description}}</span>
                        </div>
                        <div class="detail-container-actions">
                            <a href="#" onclick="editBuilding({{$mat}})">
                                <img src="{{asset('assets/images/ios-create.svg')}}" alt="">
                            </a>
                            <a href="#" onclick="deleteBuilding({{$mat->id}})">
                                <img src="{{asset('assets/images/ios-trash.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                @empty
                    <h3>Could not find any building type</h3>
                @endforelse
            </div>
        </div>
    </div>
</main>

<script src="{{asset('assets/js/sliderAction.js')}}"></script>
<script src="{{asset('assets/js/withdraw.js')}}"></script>
<script src="{{asset('assets/js/close-img.js')}}"></script>
<script>

    function deleteBuilding(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this building type!",
            icon: "warning", buttons: true, dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = '{{url('admin/building/delete')}}/' + id
            }
        });
    }

    function editBuilding(object) {
        document.getElementById('title').value = object.title;
        document.getElementById('description').value = object.description;
        document.getElementById('id').value = object.id;
        document.getElementById('submit').innerHTML = 'Submit';
        addBtn.click()
    }

</script>
</body>
</html>
