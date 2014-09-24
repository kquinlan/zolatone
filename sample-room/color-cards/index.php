<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en" ng-app="colorCards">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Saved Color Cards</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body ng-controller="colorCardsCtrl">

        <? require_once '../../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h3 class="color-white"><b>Request Samples and Color Cards<br />For Your Next Project</b></h3>
                </div>
            </section>

            <? require_once '../../common/slider.php' ?>
        </div>

        <!-- Sample Room -->
        <section class="row small-padding-top-4 small-margin-bottom-4">

        <h1 class="color-primary text-center small-margin-bottom-1">Your Previous Color Cards</h1>
            <nav class="finishes text-center">
                <ul>
                    <li ng-repeat="userColorCard in userColorCards"><a>{{ userColorCard.name }}</a></li>
                </ul>
            </nav>

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                
            </div>

        </section>

        <? require_once '../../common/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/sample-room/color-cards.js"></script>
    </body>
</html>