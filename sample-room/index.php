<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en" ng-app="sampleRoom">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Sample Room</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body ng-controller="sampleRoomCtrl">

        <? require_once '../common/header.php' ?>

        <div ng-hide="colorCardMode" class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h3 class="color-white"><b>Request Samples and Color Cards<br />For Your Next Project</b></h3>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Sample Room -->
        <section class="row small-margin-bottom-4">

            <div ng-hide="colorCardMode" class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">The Sample Room</h1>
                <p>Zolatone’s Sample Room lets you store, access and order samples of your favorite Zolatone finishes all in one convenient place. With the Sample Room, you can create individual On Demand cards to be used as personalized tip cards of your favorite colors for all of your unique projects and clients.</p>

                <h3 class="color-primary text-center small-margin-bottom-1">Two Great Ways to Sample Zolatone</h3>
                <p>When you’re ready to order samples, you now have two great options. We can send out loose 4x5 samples or you can create an On Demand card. On Demand cards allow you to create collections of your favorite Zolatone colors and turn them into your very own custom tip cards.</p>
                <p>You must be logged in to create On Demand cards. To create a new On Demand card, simply start by clicking the button below.</p>
            </div>

            <div ng-show="colorCardMode && !editColorCard" class="medium-8 small-11 columns small-centered small-margin-top-2 small-padding-top-5 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Create Custom Color Cards</h1>
                <p>Zolatone’s Color On Demand feature lets you create custom collections of your favorite Zolatone colors and turn them into your very own custom color cards. On Demand cards make it easy for you to present, share and order Zolatone paint by placing all of your favorite colors on one convenient card.</p>
                <p>Have you got a selection of whites that you are always specifying? Maybe school colors are your thing? With Zolatone’s Color On Demand cards, you can design your own color collection online and in about a week you’ll receive a printed Color On Demand card featuring real samples of the colors you selected. You choose the colors, we’ll create the card!</p>

                <h3 class="color-primary text-center small-margin-bottom-1">Simple, fun, unique!</h3>
                <p>Watch our <a href="">video</a> to discover the benefits of Color On Demand and to see how easy it is to make your very own custom color cards.</p>
            </div>

            <div ng-show="colorCardMode && editColorCard" class="medium-8 small-11 columns small-centered small-margin-top-2 small-padding-top-5 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Arrange Your Color Card</h1>
                <p>Now that you have your colors picked out you can select the order that they will appear on your Color On Demand card. When you have everything in the right order, hit submit and we will send your card out to you in about a week!</p>
                <p>Rearrange the order of your Color On Demand card by dragging the items to your preferred position.</p>
            </div>

            <div class="small-12 columns small-padding-top-1">
                <?
                    if(isUserLoggedIn()) {
                        echo '<h3 ng-hide="editColorCard" class="color-primary text-center small-margin-bottom-1">Your Saved Samples</h3>';
                        require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/class/userSamples.php");
                    } else {
                        echo '<h3 class="color-primary text-center small-margin-bottom-1">Log In to See Your Saved Samples</h3>';
                    }
                ?>
            </div>

            <div class="small-12 columns small-margin-top-2 text-center">
                <?
                    if(!isUserloggedIn()) {
                        echo '<a href="#" class="small login-button button">Log in / Sign Up</a>';
                    } else {
                        echo '<a href="/finishes" class="small button">Take me to the Finishes</a>';
                    }
                ?>
            </div>

        </section>

        <? require_once '../common/footer.php' ?>

        <script src="/js/vendor/jquery.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
        <script src="/js/sample-room/sortable.js"></script>
        <script src="/js/vendor/jquery.ui.touch-punch.min.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/sample-room/sample-room.js"></script>
        <script src="/js/finishes/finishes.js"></script>
    </body>
</html>