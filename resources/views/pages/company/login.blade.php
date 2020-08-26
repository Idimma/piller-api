<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
    <div class="container">
        <a href="{{url('/')}}" class="logo">
            Stokkpile.com
        </a>
        <img src="../../assets/images/woman-with-laptop.svg" class="woman">
        <div class="login">
            <p class="login-header">Log In</p>
            <form action="">
                <input type="email" name="email" placeholder="Company Email" required>
                <div class="password-div">
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="button"><img src="../../assets/images/eye.svg"></button>
                </div>
                <div class="login-social">
                    <p class="login-social-text">Or Log in with your social network</p>
                    <p class="login-social-line"></p>
                </div>
                <div class="social-media-links">
                    <button type="button"><img src="../../assets/images/fb.svg"></button>
                    <button type="button"><img src="../../assets/images/ln.svg"></button>
                    <button type="button"><img src="../../assets/images/tw.svg"></button>
                    <button type="button"><img src="../../assets/images/google.svg"></button>
                </div>
                <button type="submit" class="submit">Log In</button>
            </form>
            <a href="signup.html" class="sign-up">Sign Up</a>
            <p class="forgot-password">Forgot your password? <a href="../reset.html">Reset it</a></p>
            <hr>
            <p class="terms-and-conditions">
                <a href="../#">Terms & Conditions</a> and <a href="../#">Privacy Policy</a>
            </p>
            <script src="../../assets/js/login.js"></script>
        </div>
    </div>
</body>
</html>
