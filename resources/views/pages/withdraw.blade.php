@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plansLayout.css')}}">
@endsection
@section('content')
    <div class="cover-overlay"></div>
    <main>
        <div class="overlayer">
            <div class="withdrawal-confirmation">
                <div class="confirmation-header">
                    <h2><span class="underline">WITH</span>DRAWAL CONFIRMATION</h2>
                    <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
                </div>
                <div class="confirmation-body">
                    <table class="popup">
                        <thead>
                        <tr>
                            <th class="top-cell left-cell">Plan Name</th>
                            <th class="top-cell">Materials to be withdrawn</th>
                            <th class="top-cell right-cell">Location</th>
                        </tr>
                        </thead>
                        <tbody id="location-display" class="rows">

                        </tbody>

                    </table>
                </div>

                <button onclick="document.getElementById('myForm').submit()" class="confirm">
                    Confirm
                </button>
            </div>
            <div class="notify-img-container">
                <img src="{{asset('assets/images/cancel.svg')}}" class="close-img x-button" alt="">
                <img src="{{asset('assets/images/Group 82.svg')}}" alt="success-img" class="notify-img success-img">
                <img src="{{asset('assets/images/Group 86.svg')}}" alt="failed-img" class="notify-img failed-img">
            </div>
        </div>

        <div class="main-container">
            @include('partial.dash-header')


            <div class="main-body">
                <form id="withdrawal-form" action="{{url('plan/withdraw', $plan)}}" method="post" class="plans">

                    @csrf
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name: {{$plan->plan_name}}</h2>
                        </div>
                        <input name="plan_id" value="{{$plan->id}}" hidden/>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Location</h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input type="radio" onchange="showAddLocation(this, true)" name="location_type"
                                       value="1" id="one">
                                <label for="one">One Location</label>
                            </div>

                            <div class="radio-group align-items-center d-flex">
                              <label><input type="radio" onchange="showAddLocation(this)"
                                       name="location_type" value="2"
                                       id="various">
                                <label for="various py-0 px-2">Various Locations</label>
                            </div>

                        </div>
                    </div>

                    <h2>Location(s) and Units to withdraw</h2>

                    <div class="card bg-transparent mb-3">
                        <input type="text" autocomplete="false"
                               name="locations[]" aria-autocomplete="false"
                               onchange="document.getElementById('address').innerHTML = this.value"
                               class="form-input-full"
                               placeholder="Type Your Address">

                        <div class="d-flex mt-3 ">
                            <div class="d-flex flex-column half-groups mr-2 flex-grow-1">
                                <label for="blocks-unit">Unit of Blocks</label>
                                <input type="number" name="block[]" class="half-input w-100">
                            </div>

                            <div class="d-flex flex-column ml-2 flex-grow-1">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" name="cement[]"
                                       class="half-input w-100">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div id="location-list" hidden>

                        </div>

                        <a href="#" class="mt-5" onclick="addLocation()" style="margin: 10px 2px" hidden
                           id="add-location">
                            Add Another Address
                        </a>
                    </div>

                    <button type="submit" class="btn mt-5">Submit</button>
                </form>
            </div>
        </div>
        @include('partials.bottom-rates')
    </main>
@stop

@section('scripts')
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/withdraw.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    <script src="{{asset('assets/js/close-img.js')}}"></script>
    <script>

        if (confirmBtn)
            confirmBtn.addEventListener("click", () => {
                Toastify({text: 'Sending Progress', close: true, backgroundColor: 'blue'}).showToast();
                fetch('{{url('/send-otp')}}', formData).then(() => {
                    Toastify({
                        text: 'OTP Sent successfully',
                        close: true, backgroundColor: 'green'
                    }).showToast();
                }).catch((error) => {
                    Toastify({
                        text: 'Could not send OTP',
                        close: true, backgroundColor: 'red'
                    }).showToast();
                });
                swal({
                    text: 'Enter your OTP to authenticate your withdrawal',
                    content: "input",
                    button: {text: "Submit", closeModal: false,},
                }).then((password) => {
                    if (password) {
                        const formData = new FormData(form);
                        formData.append('otp', password);
                        fetch('{{url('withdraw')}}', {method: 'post', mode: 'no-cors', body: formData}).then(() => {
                            withdrawalTable.classList.add('hideConfirmation');
                            successImg.classList.add('showSuccess');
                            closeImg.classList.add('showSuccess')
                        }).catch((error) => {
                            withdrawalTable.classList.add('hideConfirmation')
                            failedImg.classList.add('showSuccess')
                            closeImg.classList.add('showSuccess')
                        });
                        {{--return window.location.href = '{{url('plan/fund')}}/' + id + '/' + amount + '/' + password--}}


                    } else {
                        return Toastify({
                            text: 'OTP box can not be empty',
                            close: true, backgroundColor: 'red'
                        }).showToast();
                    }
                });


            })


        function showAddLocation(param, state) {
            if (state) {
                document.getElementById('add-location').hidden = true;
                document.getElementById('location-list').hidden = true;
                return
            }
            if (!param.checked) {
                document.getElementById('add-location').hidden = true;
                document.getElementById('location-list').hidden = true;

            }
            if (param.checked) {
                document.getElementById('add-location').hidden = false;
                document.getElementById('location-list').hidden = false;

            }
        }

        function addLocation() {
            const list = document.getElementById('location-list');
            const id = 'loc-' + Math.random().toString().replace('0.', '');
            const view = `<div  id="${id}" class="card bg-transparent mb-3">
                            <div class="d-flex">
                                <input type="text" autocomplete="false"
                                       name="locations[]" aria-autocomplete="false"
                                    onchange="document.getElementById('address').innerHTML = this.value"
                                   class="form-input-full"
                                   style="flex: auto; margin-right: 5px"
                                   placeholder="Type Your Address">
                                   <img src="{{asset('assets/images/cancel.svg')}}"
                                   onclick="removeLocation('${id}')" class="x-button" alt="">
                            </div>

                            <div class="d-flex mt-3 ">
                                <div class="d-flex flex-column half-groups mr-2 flex-grow-1">
                                    <label for="blocks-unit">Unit of Blocks</label>
                                    <input type="number" name="block[]" min="1" class="half-input w-100">
                                </div>

                                <div class="d-flex flex-column ml-2 flex-grow-1">
                                    <label for="cement-unit">Bags of Cement</label>
                                    <input type="number" min="1" name="cement[]" class="half-input w-100">
                                </div>
                            </div>
                        </div>
`;
            const div = document.createElement("div");
            div.innerHTML = view;
            list.appendChild(div);
        }

        function removeLocation(id) {
            const view = document.getElementById(id);
            view.parentNode.removeChild(view)
        }

        const form = document.querySelector('#withdrawal-form');
        let withdraws = [];


        if (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault()
                if (overlayer === null) {
                    overlay.classList.add('show-form')
                } else {
                    overlayer.classList.add('show-form')
                }
                const loc_display = document.getElementById('location-display')

                const formData = new FormData(form);
                formData.getAll('locations[]').forEach((location, index) => {
                    withdraws.push({
                        location,
                        block: formData.getAll('block[]')[index] || 0,
                        cement: formData.getAll('cement[]')[index] || 0,
                    });

                    if (location) {
                        const view = document.createElement("tr")
                        view.innerHTML = `
                            <td class="left-cell">{{$plan->plan_name}}</td>
                            <td>
                                <p><span>${formData.getAll('block[]')[index] || 0}</span> Bags of Cement</p>
                                <p><span>${formData.getAll('cement[]')[index] || 0}</span> Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>${location}</p>
                            </td>`;

                        loc_display.appendChild(view)
                    }
                })

            })
        }

    </script>


@stop





<!-- add the close tag to the each of the pop ups and make them close their parent divs -->
<!-- remove the lines from the table -->
<!-- make every alternate row the grey color -->
<!-- make the table scrollable -->
