<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../assets/css/signup.css">
</head>
<body>
    <div class="container">
        <a href="{{url('/')}}" class="logo">
            Stokkpile.com
        </a>
        <img src="../../assets/images/woman-with-laptop.svg" class="woman">
        <div class="signup">
            <p class="signup-header">Join Us</p>
            <form action="">
                <div class="row mb-10">
                    <input type="text" class="half" name="fname" placeholder="First Name" required>
                    <input type="text" class="half" name="lname" placeholder="Last Name" required>
                </div>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="number" placeholder="Phone Number" required>
                <div class="password-div">
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="button"><img src="../../assets/images/eye.svg"></button>
                </div>
                <p class="agree">
                    <input name="agree" id="agree" type="checkbox">
                    <label for="agree"><img src="../../assets/images/check.svg"></label>
                    <span>I agree with the terms and conditions</span>
                </p>
                <div class="signup-social">
                    <p class="signup-social-text">Or Sign up with social media</p>
                    <p class="signup-social-line"></p>
                </div>
                <div class="social-media-links">
                    <button type="button"><img src="../../assets/images/fb.svg"></button>
                    <button type="button"><img src="../../assets/images/ln.svg"></button>
                    <button type="button"><img src="../../assets/images/tw.svg"></button>
                    <button type="button"><img src="../../assets/images/google.svg"></button>
                </div>
                <button type="submit" class="submit">Next</button>
            </form>
            <p class="login">Already have an account?<a href="../login.html">Log In</a></p>
            <hr>
            <p class="terms-and-conditions">
                <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
            </p>
        </div>
    </div>
    <script src="../../assets/js/signup.js"></script>
    <script src="../../assets/js/Required-inputs.js"></script>
</body>
</html>
