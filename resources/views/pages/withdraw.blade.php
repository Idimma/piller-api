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
                        <tbody class="rows">
                        <tr>
                            <td class="left-cell">{{$plan->plan_name}}</td>
                            <td>
                                <p><span id="block"></span> Bags of Cement</p>
                                <p><span id="cement"></span> Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p id="address"></p>
                            </td>
                        </tr>



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
                <form id="myForm" action="{{url('plan/withdraw', $plan)}}" method="post" class="plans">

                    @csrf
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name</h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input name="plan_id" value="{{$plan->id}}" hidden/>
                        <input value="{{$plan->plan_name}}" class="form-input-full"/>

                        {{--                        <select class="form-input-full" name="plan_id">--}}
                        {{--                            @foreach($user->plans as $plan)--}}
                        {{--                                <option value="{{$plan->id}}">{{$plan->plan_name}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                        {{--                        @empty($user->plans)--}}
                        {{--                            <p>You don't have any plan, add to continue <a href="{{url('no-plan')}}">New Plan</a></p>--}}
                        {{--                        @endempty--}}
                        {{--                        <input type="text" name="plan_id" hidden class="form-input-full">--}}
                        {{--                        <div class="checkbox-div">--}}
                        {{--                            <input type="checkbox" id="checkMe">--}}
                        {{--                            <label for="checkMe">--}}
                        {{--                                Click here to schedule for material's delivery to your construction site by our pick up--}}
                        {{--                                agents--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Location</h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input type="radio" onchange="showAddLocation(this, true)" name="location_type" value="1" id="one">
                                <label for="one">One Location</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" onchange="showAddLocation(this)" name="location_type" value="2"
                                       id="various">
                                <label for="various">Various Locations</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Location</h2>
                        </div>
                        <div class="units-of">
                            <div class="half-groups">
                                <label for="blocks-unit">Unit of Blocks</label>
                                <input type="number" name="block" onchange="document.getElementById('block').innerHTML = this.value" min="1" id="blocks-unit" class="half-input">
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" onchange="document.getElementById('cement').innerHTML = this.value"
                                       min="1" id="cement-unit" name="cement" class="half-input">
                            </div>

                        </div>
                        <div id="location-list">
                            <input type="text" autocomplete="false"
                                   name="locations[]" onchange="document.getElementById('address').innerHTML = this.value"
                                   class="form-input-full" placeholder="Type Your Address">
                        </div>

                        <a href="#" onclick="addLocation()" hidden id="add-location">
                            Add Another Address
                        </a>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Password</h2>
                        </div>
                        <input type="password" name="password" class="form-input-full">
                    </div>
                    <button class="btn plans-submit">Submit</button>
                </form>
            </div>
        </div>
        @include('partials.bottom-rates')
    </main>
@stop

@section('scripts')
    <script>

        function showAddLocation(param, state) {
            if(state){
                counter = 1;
                renderLocation()
                document.getElementById('add-location').hidden = true;
                return
            }
            if (!param.checked) {
                document.getElementById('add-location').hidden = true;
            }
            if (param.checked) {
                document.getElementById('add-location').hidden = false;
            }
        }

        let counter = 1;

        function renderLocation() {
            const list = document.getElementById('location-list');
            list.innerHTML = '';
            const loc = `<input type="text" autocomplete="false"
                                  name="locations[]"
                                   class="form-input-full" style="margin-top: 10px" placeholder="Type Your Address">`
            for (let i = 0; i < counter; i++) {
                list.innerHTML += loc;
            }
        }

        function addLocation() {
            counter++;
            renderLocation();
        }

        function removeLocation() {
            counter -= 1;
            if (counter < 1) counter = 1;
            renderLocation();
        }


    </script>
    <script src="{{asset('assets/js/withdraw.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    {{--    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>--}}
    <script src="{{asset('assets/js/close-img.js')}}"></script>

@stop





<!-- add the close tag to the each of the pop ups and make them close their parent divs -->
<!-- remove the lines from the table -->
<!-- make every alternate row the grey color -->
<!-- make the table scrollable -->
