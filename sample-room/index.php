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

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h3 class="color-white"><b>Request Samples and Color Cards<br />For Your Next Project</b></h3>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Contact Us -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">The Sample Room</h1>
                <p>Zolatone’s Sample Room lets you store, access and order samples of your favorite Zolatone finishes all in one convenient place. With the Sample Room, you can create individual Sample Boards to be used as personalized tip cards of your favorite colors for all of your unique projects and clients.</p>

                <h3 class="color-primary text-center small-margin-bottom-1">Two Great Ways to Sample Zolatone</h3>
                <p>When you’re ready to order samples, you now have two great options. We can send out loose 4x5 samples or you can create an On Demand card. On Demand cards allow you to create collections of your favorite Zolatone colors and turn them into your very own custom tip cards.</p>
                <p>You must be logged in to create Sample Boards and On Demand cards. To create a new sample board, or add to an existing board, simply click the icon next to the sample you would like to add. </p>

                <?
                    if(isUserLoggedIn()) {
                        echo '<h3 class="color-primary text-center small-margin-bottom-1">' . $loggedInUser->displayname . '\'s Saved Samples</h3>';
                        require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/class/userSamples.php");
                    } else {
                        echo '<h3 class="color-primary text-center small-margin-bottom-1">Log In to See Your Saved Samples</h3>';
                    }
                ?>

                <div class="small-12 columns small-padding-top-1 text-center">
                    <?
                        if(!isUserloggedIn()) {
                            echo '<a href="#top" class="login-button button">Log in / Sign Up</a>';
                        } else {
                            echo '<a href="/finishes" class="button">Take me to the Finishes</a>';
                        }
                    ?>
                </div>
            </div>

        </section>

        <? require_once '../common/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/sample-room/sample-room.js"></script>
        <script src="/js/finishes/finishes.js"></script>
    </body>
</html>