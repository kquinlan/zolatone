<!-- index.php -->
<!DOCTYPE html>
<html lang="en" ng-app="finishes">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Where to Buy</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body ng-controller="finishesCtrl">

        <? require_once '../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>The most distinctive high<br />performance coatings available.</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Finishes -->
        <section class="row">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Finishes</h1>
                <div class="small-margin-top-2 medium-8 small-centered columns">
                    <input ng-model="search.tags" class="small-margin-0" type="text" placeholder="Search..." />
                    <span class="text-smaller">Search for colors i.e. ‘PFX-10287’, ‘red’, ‘cool’, ‘neutral’</span>
                </div>
            </div>

        </section>

        <section class="row">

            <nav class="finishes small-margin-top-3 text-center">
                <ul>
                    <li><a href="#/counterpointe">Counterpointe</a></li>
                    <li><a href="#/lluminations">Lluminations</a></li>
                    <li><a href="#/metal">Metal</a></li>
                    <li><a href="#/polomyx">Polomyx</a></li>
                    <li><a href="#/polomyx-airless">Polomyx Airless</a></li>
                    <li><a href="#/flex">Flex</a></li>
                    <li><a href="#/light-vision">Light Vision</a></li>
                </ul>
            </nav>

            <!-- Templates are loaded into here from /finishes/partials/ folder -->
            <div ng-view></div>

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
        <script src="/js/finishes/finishes.js"></script>
    </body>
</html>