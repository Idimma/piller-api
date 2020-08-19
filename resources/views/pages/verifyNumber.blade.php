<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/verifyNumber.css">
</head>
<body>
    <div class="notify-image-container">
        <img class="notify-img success-image" src="../assets/images/Group 51.svg" alt="success image">
        <img src="../assets/images/cancel.svg" class="close-img x-button" alt="">
        <img src="../assets/images/Group 86.svg" alt="failed-img" class="notify-img failed-img">
    </div>
    <div class="overlay"></div>
    <div class="container">
        <header>
            <h2 class="Lead-Heading"> <a href="#"> Stokkpile.com </a></h2>
        </header>
        <main>
            <img src="../assets/images/phoneGreenTick.svg" alt="phone Image" class="phone-image" >
            <form class="Verification-form">
                <div class="form-heading">Verify Your Phone Number</div>
                <div class="form-body">
                    <p class="Lead-text">
                        Kindly enter the verification code that was sent to you via sms.
                    </p>
                    <input type="text" class="Verification-input" placeholder="Verification Code" required >
                    <button class="Verification-submit" type="submit">Confirm</button>
                    <p class="Verification-failed">Didn't get the verification code ?<span class="call"><a class="hoverme" href="#"> Call me </a></span>
                    </p>
                    <div class="footer">
                        <div class="separationLine"></div>
                        <p class="footer-paragraph">
                        <span class="call"> <a class="hoverme" href="#">Terms & Conditions</a></span> and <span class="call"> <a class="hoverme" href="#">privacy policy</a>
                        </span>
                        </p>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script src="../assets/js/verifyNumber.js"></script> 
    <script src="../assets/js/Required-inputs.js"></script>
    <script src="../assets/js/close-img.js"></script>
    
</body>
</html>



