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
                    <img src="../assets/images/cancel.svg" class="x-button" alt="">
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
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>

                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>


                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>


                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>

                        <tr>
                            <td class="left-cell">Lagos House</td>
                            <td>
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-cell bottom-cell">Lagos House</td>
                            <td class="bottom-cell">
                                <p>100 Bags of Cement</p>
                                <p>700 Units of Blocks</p>
                            </td>
                            <td class="right-cell bottom-cell">
                                <p>4, samuel Elegushi street, Lagos</p>
                            </td>
                        </tr>

                        </tbody>

                    </table>
                </div>

                <button class="confirm">
                    Confirm
                </button>
            </div>
            <div class="notify-img-container">
                <img src="../assets/images/cancel.svg" class="close-img x-button" alt="">
                <img src="../assets/images/Group 82.svg" alt="success-img" class="notify-img success-img">
                <img src="../assets/images/Group 86.svg" alt="failed-img" class="notify-img failed-img">
            </div>
        </div>

        <div class="main-container">
            @include('partial.dash-header')


            <div class="main-body">
                <form action="" class="plans">
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Plan Name</h2>
                            <img class="question-mark" src="" alt="">
                        </div>
                        <input type="text" class="form-input-full">
                        <div class="checkbox-div">
                            <input type="checkbox" id="checkMe">
                            <label for="checkMe">
                                Click here to schedule for material's delivery to your construction site by our pick up
                                agents
                            </label>
                        </div>
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Choose Location</h2>
                        </div>
                        <div class="select-group">
                            <div class="radio-group">
                                <input type="radio" name="connected" id="one">
                                <label for="one">One Location</label>
                            </div>

                            <div class="radio-group">
                                <input type="radio" name="connected" id="various">
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
                                <input type="number" min="1" id="blocks-unit" class="half-input">
                            </div>

                            <div class="half-groups">
                                <label for="cement-unit">Bags of Cement</label>
                                <input type="number" min="1" id="cement-unit" class="half-input">
                            </div>

                        </div>
                        <input type="text" class="form-input-full" placeholder="Type Your Address">
                        {{--                            <a href="/extra-location" class="add-location">--}}
                        {{--                                Add Another Address--}}
                        {{--                            </a>--}}
                    </div>
                    <div class="form-group-full">
                        <div class="form-group-header">
                            <h2>Password</h2>
                        </div>
                        <input type="password" class="form-input-full">
                    </div>
                    <button class="btn plans-submit">Submit</button>
                </form>
            </div>
        </div>
        @include('partials.bottom-rates')
    </main>
@stop

@section('scripts')
    <script src="{{asset('assets/js/withdraw.js')}}"></script>
    <script src="{{asset('assets/js/sliderAction.js')}}"></script>
    {{--    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>--}}
    <script src="{{asset('assets/js/close-img.js')}}"></script>
@stop





<!-- add the close tag to the each of the pop ups and make them close their parent divs -->
<!-- remove the lines from the table -->
<!-- make every alternate row the grey color -->
<!-- make the table scrollable -->
