<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/plan.css">
    <link rel="stylesheet" href="../assets/css/plansLayout.css">
    <title>Stokkpiler | Home</title>
</head>
<body>


@include('partial.sidebar-mobile')
@include('partial.sidebar')
    <div class="cover-overlay"></div>

    <main>


        <div class="main-container">
            <div class="top">
                <button class="sidenav-btn">
                   <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </button>
                <div class="back">
                    <img src="../assets/images/back.svg" alt="">
                    <a href="">Back</a>
                </div>
                <table class="rates">
                    <tr>
                        <td>Rates</td>
                        <td>Block</td>
                        <td>Cement</td>
                    </tr>
                    <tr>
                        <td>Local</td>
                        <td>
                            <img src="../assets/images/rate-down.svg" alt="">
                            &#8358; 200
                        </td>
                        <td>
                            <img src="../assets/images/rate-up.svg" alt="">
                            &#8358; 2000
                        </td>
                    </tr>
                    <tr>
                        <td>International</td>
                        <td>
                            <img src="../assets/images/rate-down.svg" alt="">
                            $2
                        </td>
                        <td>
                            <img src="../assets/images/rate-up.svg" alt="">
                            $2
                        </td>
                    </tr>
                </table>
                <div class="user-controls">
                   <!--  <div class="notifications">

                    </div> -->
                    <a class="user" href="./settings.html">
                        <img src="../assets/images/user.svg" alt="">
                    </a>
                    <a class="logout" href="#">Logout</a>
                </div>
            </div>


                <div class="main-body">
                    <div class="steps-row">
                            <div class="step-group type-1">
                                <div class="step-card yellow">
                                    <h2>Step 1</h2>
                                    <p>
                                        Click on the <span class="emphasis">Add New Plan Button</span>
                                    </p>

                                    <a href="./no-plan.html" class="btn-link">
                                        Add new plan
                                    </a>

                                </div>
                        <div class="directional-arrow">
                            <img src="../assets/images/Group 94.svg" alt="" class="point-forward forwards">
                            <img src="../assets/images/Group 96.svg" alt="" class="point-downawrd down">

                        </div>
                    </div>
                    <div class="step-group type-1">
                        <div class="step-card pink">
                            <h2>Step 2</h2>
                                    <p>
                                        Fill the form for the new plan
                                    </p>

                        </div>
                        <div class="directional-arrow">
                            <img src="../assets/images/Group 94.svg" alt="" class="point-backwards forwards">
                            <img src="../assets/images/Group 96.svg" alt="" class="point-downawrd down">
                        </div>
                    </div>
                    <div class="step-group type-2">
                        <div class="step-card blue">
                            <h2>Step 3</h2>
                                    <p>
                                        Add a valid debit card before you finish filling the new plan form.
                                    </p>
                        </div>
                        <div class="directional-arrow">
                            <img src="../assets/images/Group 96.svg" alt="" class="point-downawrd">
                        </div>
                    </div>
                   </div>
                   <div class="steps-row reverse">
                            <div class="step-group type-3">
                        <div class="step-card purple">
                            <h2>Step 6</h2>
                                    <p>
                                        Enjoying the depositing ride to withdraw building materials in the future.
                                    </p>
                        </div>
                        <div class="directional-arrow six">
                            <img src="../assets/images/Group 95.svg" alt="" class="point-backwards forwards">
                            <img src="../assets/images/Group 96.svg" alt="" class="point-downawrd down">
                        </div>
                    </div>
                    <div class="step-group type-3">
                        <div class="step-card cyan">
                            <h2>Step 5</h2>
                                    <p>
                                        Check our dashboard to see you updated plan
                                    </p>

                                    <a href="./dashboard.html" class="btn-link">
                                        Dashboard
                                    </a>

                        </div>
                        <div class="directional-arrow">
                            <img src="../assets/images/Group 95.svg" alt="" class="point-backwards forwards">
                        </div>
                    </div>
                    <div class="step-group type-2">
                        <div class="step-card green">
                            <h2>Step 4</h2>
                                    <p>
                                        Submit the form
                                    </p>
                        </div>
                        <div class="directional-arrow">
                            <img src="../assets/images/Group 96.svg" alt="" class="point-backwards down">
                        </div>
                    </div>
                   </div>

                </div>
    </div>
    <div class="footer">
            <div class="footer-inner">
                            <table class="stocks">
                                    <tr>
                                        <td>Rates</td>
                                        <td>Blocks</td>
                                        <td>Cement</td>
                                    </tr>
                                    <tr>
                                        <td>Local</td>
                                        <td>
                                            <img src="../assets/images/Group 44.svg" alt="">
                                            <h3>&#8358 200</h3>
                                        </td>
                                        <td>
                                            <img src="../assets/images/Group 38.svg" alt="">
                                            <h3>&#8358 200</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Internatinal</td>
                                        <td>
                                            <img class="down-arrow" src="../assets/images/Group 44.svg" alt="">
                                            <h3>$2</h3>
                                        </td>
                                        <td>
                                            <img class="up-arrow" src="../assets/images/Group 38.svg" alt="">
                                            <h3>$2</h3>
                                        </td>
                                    </tr>

                                </table>
            </div>
        </div>
    </main>

    <script src="../assets/js/sliderAction.js"></script>
    <script src="../assets/js/Required-inputs.js"></script>


</body>
</html>
