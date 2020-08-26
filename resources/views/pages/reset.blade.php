<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    @include('partial.toastAlert')

    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
</head>
<body>
    <div class="container">
        <a href="{{url('/')}}" class="logo">
            Stokkpile.com
        </a>
        <img src="{{asset('assets/images/forgotlarge.svg')}}" class="forgot-password">
        <div class="reset">
            <p class="reset-header">Reset Password</p>
            <p class="reset-text">Enter the email attached to your account to get a password reset link</p>
            <form>
                <input type="email" name="email" placeholder="Email">
                <button type="submit" class="submit">Submit</button>
            </form>
            <a href="{{url('login')}}" class="cancel">Cancel</a>
            <hr>
            <p class="terms-and-conditions">
                <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
            </p>
        </div>
    </div>
</body>
</html>
