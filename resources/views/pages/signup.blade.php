<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @include('partial.toastAlert')
    <link rel="stylesheet" href="{{asset('assets/css/signup.css')}}">

</head>
<body>


<div class="container">

    <a href="{{url('/')}}" class="logo">
        Stokkpile.com
    </a>
    <img src="{{asset('assets/images/woman-with-laptop.svg')}}" class="woman">
    <div class="signup">


        <p class="signup-header">Join Us</p>
        <form action="{{url('user/register')}}" method="post">
            @csrf
            <div class="row mb-10">
                <input type="text"  value="{{old('first_name')}}" class="half" name="first_name" placeholder="First Name" required>
                <input type="text"  value="{{old('last_name')}}" class="half" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="row">
                <input type="email"  value="{{old('email')}}" name="email" class="half" placeholder="Email" required>
                <div class="select select--inline form-group">
                    <div class="input-div">
                        <input type="text" name="country" value="{{old('country')}}" id="country" placeholder="Country" disabled>
                        <button type="button" class="select__options-toggle-btn">
                            <img src="{{asset('assets/images/arrow-down-grey.svg')}}">
                        </button>
                    </div>
                    <ul class="select-options programs" data-target="country">
                        <li class="select-option">
                            <button type="button">Nigeria</button>
                        </li>
                        <li class="select-option">
                            <button type="button">U.S</button>
                        </li>
                        <li class="select-option">
                            <button type="button">Ghana</button>
                        </li>
                        <li class="select-option">
                            <button type="button">England</button>
                        </li>
                        <li class="select-option">
                            <button type="button">Kenya</button>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="text" name="phone"  value="{{old('phone')}}" placeholder="Phone Number" required>
            <div class="password-div">
                <input type="password" name="password" placeholder="Password" required>
                <button type="button"><img src="{{asset('assets/images/eye.svg')}}"></button>
            </div>
            <p class="agree">
                <input name="agree" id="agree" type="checkbox">
                <label for="agree"><img src="{{asset('assets/images/check.svg')}}"></label>
                <span>I agree with the terms and conditions</span>
            </p>
            {{--                <div class="signup-social">--}}
            {{--                    <p class="signup-social-text">Or Sign up with social media</p>--}}
            {{--                    <p class="signup-social-line"></p>--}}
            {{--                </div>--}}
            {{--                <div class="social-media-links">--}}
            {{--                    <button type="button"><img src="../assets/images/fb.svg"></button>--}}
            {{--                    <button type="button"><img src="../assets/images/ln.svg"></button>--}}
            {{--                    <button type="button"><img src="../assets/images/tw.svg"></button>--}}
            {{--                    <button type="button"><img src="../assets/images/google.svg"></button>--}}
            {{--                </div>--}}
            <button type="submit" class="submit">Next</button>
        </form>
        <p class="login">Already have an account?<a href="{{url('login')}}">Log In</a></p>
        <hr>
        <p class="terms-and-conditions">
            <a href="{{url('terms')}}">Terms & Conditions</a> and <a href="{{url('privacy')}}">Privacy Policy</a>
        </p>
    </div>
</div>
<script src="{{asset('assets/js/signup.js')}}"></script>
<script src="{{asset('assets/js/Required-inputs.js')}}"></script>

</body>
</html>
