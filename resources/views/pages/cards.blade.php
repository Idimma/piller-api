<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stokkpiler | Cards</title>
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/cards.css">
</head>
<body>
    <div class="container">

        @include('partial.sidebar-mobile')
        @include('partial.sidebar')
        <div class="main">
            @include('partial.dash-header')
            <div class="cards">
                <div class="card black">
                    <button class="remove-card">
                        <img src="../assets/images/delete-card.svg">
                    </button>
                    <div class="remove-card-box">
                        <p class="remove-card-box__header">
                            Remove Card
                        </p>
                        <div class="remove-card-box__description">
                            Kindly note that this card would be removed permanently from this platform.
                        </div>
                        <div class="remove-card__buttons">
                            <button class="remove-card__button">
                                Cancel
                            </button>
                            <button class="remove-card__button remove-card__button--bg-purple">
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="card__brands">
                        <img src="../assets/images/card-rect.svg">
                        <img src="../assets/images/master-card-2.svg" alt="">
                    </div>
                    <div class="card__numbers">
                        <span>5399</span>
                        <span>3456</span>
                        <span>6788</span>
                        <span>2345</span>
                    </div>
                    <div class="card__details">
                        <div>
                            <p>CARD HOLDER</p>
                            <p>SAMUEL FAPOUN</p>
                        </div>
                        <div>
                            <p>EXPIRES</p>
                            <p>09/21</p>
                        </div>
                    </div>
                </div>
                <div class="card light-green">
                    <button class="remove-card">
                        <img src="../assets/images/delete-card.svg">
                    </button>
                    <div class="remove-card-box">
                        <p class="remove-card-box__header">
                            Remove Card
                        </p>
                        <div class="remove-card-box__description">
                            Kindly note that this card would be removed permanently from this platform.
                        </div>
                        <div class="remove-card__buttons">
                            <button class="remove-card__button">
                                Cancel
                            </button>
                            <button class="remove-card__button remove-card__button--bg-purple">
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="card__brands">
                        <img src="../assets/images/card-rect.svg">
                        <img src="../assets/images/master-card-2.svg" alt="">
                    </div>
                    <div class="card__numbers">
                        <span>5399</span>
                        <span>3456</span>
                        <span>6788</span>
                        <span>2345</span>
                    </div>
                    <div class="card__details">
                        <div>
                            <p>CARD HOLDER</p>
                            <p>SAMUEL FAPOUN</p>
                        </div>
                        <div>
                            <p>EXPIRES</p>
                            <p>09/21</p>
                        </div>
                    </div>
                </div>
                <div class="card blue">
                    <button class="remove-card">
                        <img src="../assets/images/delete-card.svg">
                    </button>
                    <div class="remove-card-box">
                        <p class="remove-card-box__header">
                            Remove Card
                        </p>
                        <div class="remove-card-box__description">
                            Kindly note that this card would be removed permanently from this platform.
                        </div>
                        <div class="remove-card__buttons">
                            <button class="remove-card__button">
                                Cancel
                            </button>
                            <button class="remove-card__button remove-card__button--bg-purple">
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="card__brands">
                        <img src="../assets/images/card-rect.svg">
                        <img src="../assets/images/master-card-2.svg" alt="">
                    </div>
                    <div class="card__numbers">
                        <span>5399</span>
                        <span>3456</span>
                        <span>6788</span>
                        <span>2345</span>
                    </div>
                    <div class="card__details">
                        <div>
                            <p>CARD HOLDER</p>
                            <p>SAMUEL FAPOUN</p>
                        </div>
                        <div>
                            <p>EXPIRES</p>
                            <p>09/21</p>
                        </div>
                    </div>
                </div>
                <a class="add-card" href='no-card.html'>
                    <img src="../assets/images/add-purple.svg" alt="">
                    Add Card
                </a>
            </div>
            <table class="rates bottom">
                <tr>
                    <td>Rates</td>
                    <td>Block</td>
                    <td>Cement</td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td>
                        <img src="../assets/images/rate-down.svg">
                        &#8358 200
                    </td>
                    <td>
                        <img src="../assets/images/rate-up.svg">
                        &#8358 2000
                    </td>
                </tr>
                <tr>
                    <td>International</td>
                    <td>
                        <img src="../assets/images/rate-down.svg">
                        $2
                    </td>
                    <td>
                        <img src="../assets/images/rate-up.svg">
                        $2
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script src="../assets/js/sidenav.js"></script>
    <script src="../assets/js/cards.js"></script>
</body>
</html>
