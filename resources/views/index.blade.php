<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    @include('partial.toastAlert')
    <link rel="stylesheet" href="{{asset('assets/css/homepage.css')}}">
</head>
<body>
<div class="mobile-nav">
    <ul class="mobile-nav-list">
        <li class="mobile-nav-item"><a href="#whysection" class="mobile-nav-link">Why Stokkpiler</a></li>
        <li class="mobile-nav-item"><a href="#howitworks" class="mobile-nav-link">How it works</a></li>
        <li class="mobile-nav-item"><a href="#contactus" class="mobile-nav-link">Contact us</a></li>
        <li class="mobile-nav-item"><a href="{{url('login')}}" class="mobile-nav-link">Login</a></li>
    </ul>
</div>
<div class="container">
    <header>
        <img class="Header-background" src="{{asset('assets/images/Path 6.svg')}}" alt="homepage top background">
        <div class="Header-content">
            <div class="heading-top">
                <div class="logo">
                    <a href="#">
                        Stokkpile.com
                    </a>
                </div>
                <div class="hamburger">
                    <span class="hamburger-child"></span>
                    <span class="hamburger-child"></span>
                    <span class="hamburger-child"></span>
                </div>
                <nav class="navbar">
                    <ul class="nav-options">
                        <li class="nav-item">
                            <a href="{{url('login')}}" class="navlink">Cooperate </a>
                        </li>
                        <li class="nav-item">
                            <a href="#howitworks" class="navlink">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#whysection" class="navlink">How it works?</a>
                        </li>
                        <li class="nav-item">
                            <a href="#whysection" class="navlink">Why Stokkpiler</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('login')}}" class="navlink">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('register')}}"
                               class="navlink signup-btn btn">Sign Up</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-bottom">
                <div class="text-section">
                    <h1 class="Header-Large-Heading">
                        Stockpile building materials.
                    </h1>
                    <p class="Header-lead-text">
                        Accumulate building materials by automatically depositing small amounts
                        of money, which is instantly converted to equivalent amount of building materials
                        which you can witdraw and pick up tommorow or in several years time.
                    </p>
                    <a href="{{url('register')}}" class="header-btn btn">
                        Sign Up
                    </a>
                </div>
                <img class="img-blocks" src="{{asset('assets/images/undraw_building_blocks_n0nc.svg')}}"
                     alt="undraw_building_blocks_n0nc">
            </div>
        </div>
    </header>
    <section id="whysection" class="why-stockpiler">
        <div class="why-stockpiler-heading">
            <h1 class="why-stockpiler-heading-lead">Why Stokkpiler?</h1>
            <p class="why-stockpiler-heading-sub">
                We offer the best services for Stockpiling
            </p>
        </div>

        <div class="why-stockpiler-body">
            <div class="reason">
                <h2 class="reason-header">
                    Easy to use.
                </h2>
                <p class="reason-text">
                    Deposit regular amounts of money on a recurring basis, automatically or manually.
                </p>
            </div>
            <div class="reason">
                <h2 class="reason-header">
                    Enforces discipline.
                </h2>
                <p class="reason-text">
                    Once you deposit, you can only withdraw in materials not cash.
                </p>
            </div>
            <div class="reason">
                <h2 class="reason-header">
                    Flexible
                </h2>
                <p class="reason-text">
                    You can withdraw and pickup materials anywhere in the Country.
                </p>
            </div>
            <div class="reason">
                <h2 class="reason-header">
                    Transparent
                </h2>
                <p class="reason-text">
                    Login to see accumulated materials in your virtual store, track transactions.
                </p>
            </div>
        </div>


    </section>
    <section class="Features">
        <div class="Features-heading">
            <h1 class="Features-heading-lead">Our Features</h1>
            <p class="Features-heading-sub">
                We offer the best services for Stockpiling
            </p>
        </div>
        <div class="Features-body">
            <div class="feature">
                <div class="feature-image-container">
                    <img class="feature-img top-left" src="{{asset('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="feature-heading">
                    Start with any amount
                </h2>
                <p class="feature-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="feature">
                <div class="feature-image-container">
                    <img class="feature-img top-right" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="feature-heading">
                    Withdrawal is simple
                </h2>
                <p class="feature-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="feature">
                <div class="feature-image-container">
                    <img class="feature-img bottom-left" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="feature-heading">
                    Coperate savings
                </h2>
                <p class="feature-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="feature">
                <div class="feature-image-container">
                    <img class="feature-img bottom-right" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="feature-heading">
                    Set a target
                </h2>
                <p class="feature-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
        </div>
    </section>
    <section class="How-it-works">
        <div class="How-it-works-heading">
            <h1 class="How-it-works-heading-lead">How it works</h1>
            <p class="How-it-works-heading-sub">
                We will tell you how our process works.
            </p>
        </div>
        <div class="How-it-works-body" id="howitworks">
            <div class="method-group">
                <div class="method">
                    <p class="method-heading">Sign Up</p>
                    <p class="method-text">
                        Sign up with us today, we require only
                        your name, email and phone number.
                    </p>
                </div>
                <img class="method-image" src="{{url('assets/images/undraw_podcast_q6p7.svg')}}" alt="lady using laptop">
            </div>
            <div class="method-group reverse">
                <div class="method">
                    <p class="method-heading">
                        Add your card
                    </p>
                    <p class="method-text">
                        Sign up with us today, we require only
                        your name, email and phone number.
                    </p>
                </div>
                <img class="method-image push" src="{{asset('assets/images/undraw_credit_card_payment_12va.svg')}}"
                     alt="woman hold credit card">
            </div>
            <div class="method-group">
                <div class="method">
                    <p class="method-heading">
                        Specify the materials
                    </p>
                    <p class="method-text">
                        Sign up with us today, we require only
                        your name, email and phone number.
                    </p>
                </div>
                <img class="method-image" src="assets/images/undraw_add_to_cart_vkjp.svg" alt="add the cart">
            </div>
            <div class="method-group reverse">
                <div class="method">
                    <p class="method-heading">Sit back and Relax</p>
                    <p class="method-text method-last">
                        Sign up with us today, we require only
                        your name, email and phone number.
                    </p>
                    <a href="{{url('register')}}" class="Method-button">Sign Up</a>
                </div>
                <img class="method-image push" src="assets/images/undraw_investing_7u74.svg" alt="investment image">
            </div>
        </div>
    </section>
    <section class="FAQs">
        <div class="FAQs-heading">
            <h1 class="FAQs-heading-lead">Frequently asked questions</h1>
            <p class="FAQs-heading-sub">
                We provide answers to your questions
            </p>
        </div>
        <div class="FAQs-body">
            <div class="faq">
                <div class="feature-image-container">
                    <img class="feature-img top-right" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="faq-heading">
                    Question 1
                </h2>
                <p class="faq-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="faq">
                <div class="feature-image-container">
                    <img class="feature-img top-left" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="faq-heading">
                    Question 2
                </h2>
                <p class="faq-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="faq">
                <div class="feature-image-container">
                    <img class="feature-img top-left" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="faq-heading">
                    Question 3
                </h2>
                <p class="faq-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
            <div class="faq">
                <div class="feature-image-container">
                    <img class="feature-img top-right" src="{{url('assets/images/Path 373.svg')}}" alt="">
                </div>
                <h2 class="faq-heading">
                    Question 4
                </h2>
                <p class="faq-text">
                    Deposit regular amounts of money on a recurring basis automatically or manually.
                </p>
            </div>
        </div>
    </section>
    <footer id="contactus">
        <div class="footer-body">
            <div class="talk">
                <div class="talk-heading">
                    <h1 class="talk-heading-lead">Let's talk</h1>
                    <p class="talk-heading-sub">
                        Ask us anything or just say hi.
                    </p>
                </div>
                <div class="talk-connect-details">
                    <div class="detail">
                        <img src="assets/images/ios-call.svg" alt="call">
                        <h3>1234 5567 8877</h3>
                    </div>
                    <div class="detail">
                        <img src="assets/images/ios-mail.svg" alt="mail">
                        <h3>info@stokkpiler.com</h3>
                    </div>
                </div>
            </div>
            <form class="form">
                <div class="fifty-percent">
                    <h3 class="fifty-percent-header">NAME </h3>
                    <input type="text" class="fifty-percent-input" placeholder="Victoria Doe">
                </div>
                <div class="fifty-percent">
                    <h3 class="fifty-percent-header">EMAIL</h3>
                    <input type="text" class="fifty-percent-input" placeholder="Victoria@gmail.com">
                </div>
                <div class="hundred-percent">
                    <h3 class="hundred-percent-header">MESSAGE</h3>
                    <input type="text" class="hundred-percent-input" placeholder="Hi there...">
                </div>
                <button type="submit" class="footer-form-submit">
                    Send
                </button>
            </form>
        </div>
        <hr class="footer-hr">
        <div class="bottom-contents">
            <p class="copyright"> &copy; stokkpiler 2019 </p>
            <div class="social-media">
                <h4 class="social-media-lead">
                    Follow us on social media
                </h4>
                <div class="soc-icons">
                    <a href="#" class="soc-link">
                        <img src="assets/images/Orion_facebook (1).svg" alt="">
                    </a>
                    <a href="#" class="soc-link">
                        <img src="assets/images/Orion_linkedin.svg" alt="">
                    </a>
                    <a href="#" class="soc-link">
                        <img src="assets/images/Orion_twitter.svg" alt="">
                    </a>
                    <a href="#" class="soc-link">
                        <img src="{{asset('assets/images/instagram-logo.svg')}}" alt="" srcset="">
                    </a>
                    <!-- <a href="" class="soc-link"></a> -->
                </div>
            </div>
            <div class="policies">
                <a href="#" class="policy-links">
                    Privacy,
                </a>
                <a href="#" class="policy-links">
                    Terms & Conditions
                </a>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('assets/js/homepage.js')}}"></script>
</body>
</html>
