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

            <div class="small-11 columns small-centered small-padding-top-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Finishes</h1>
                <div class="small-margin-top-2 medium-9 small-centered columns">
                    <form>
                        <input ng-model="search.name" ng-change="toStart()" class="small-margin-0" type="text" placeholder="Search..." />
                        <span class="text-smaller">Search for colors by name i.e. ‘PFX-10287’</span>
                        
                        <div class="small-12 columns small-margin-top-1">
                            <div class="medium-4 columns">
                                <label>Color:</label>
                                <select ng-model="search.color" ng-change="toStart()">
                                    <option value="">All</option>
                                    <option>Black</option>
                                    <option>White</option>
                                    <option>Gray</option>
                                    <option>Red</option>
                                    <option>Pink</option>
                                    <option>Orange</option>
                                    <option>Yellow</option>
                                    <option>Green</option>
                                    <option>Blue</option>
                                    <option>Purple</option>
                                    <option>Gold</option>
                                </select>
                            </div>

                            <div class="medium-4 columns">
                                <label>Tone:</label>
                                <select ng-model="search.tone" ng-change="toStart()">
                                    <option value="">All</option>
                                    <option>Warm</option>
                                    <option>Cool</option>
                                </select>
                            </div>

                            <div class="medium-4 columns">
                                <label>Effect:</label>
                                <select ng-model="search.effect" ng-change="toStart()">
                                    <option value="">All</option>
                                    <option>Accent</option>
                                    <option>Neutral</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </section>

        <!-- Finishes Selection -->
        <section class="row">
            <div class="small-11 columns small-centered small-padding-top-1">
                <div class="medium-5 columns small-margin-bottom-2">
                    <div class="background-primary" style="padding-bottom: 94%"></div>
                </div>

                <div class="medium-7 columns small-margin-bottom-2">

                    <div class="finish-thumb small-4 medium-3 large-3 column" data="{{ color.name }}" ng-repeat="color in colors | filter:search:strict | startFrom:currentPage * pageSize | limitTo:pageSize">
                        <div style="width: 100%; height: 100%; background-size: cover" ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
                    </div>

                    <div ng-show="(colors | filter:search:strict).length > pageSize" class="clear">
                        <button class="arrow prev small" ng-disabled="currentPage == 0" ng-click="prevPage()">&#9668;</button>
                        <button class="arrow next small" ng-disabled="currentPage >= (colors | filter:search:strict).length / pageSize - 1" ng-click="nextPage()">&#9658;</button>
                    </div>

                </div>
            </div>
        </section>

        <section class="row">

            <!-- Templates are loaded into here from /finishes/partials/ folder -->
            <div ng-view></div>

        </section>

        <section class="row small-padding-top-1 small-padding-bottom-4">
            <div class="small-11 columns small-centered">

                <div class="medium-5 columns">
                    <a class="button small" href="/sample-room">Take me to the Sample Soom</a>
                    <a class="button small" href="/order-brochure">Order a Brochure</a>
                </div>

                <div class="medium-7 columns">
                    <p class="text-smaller">We have more colors to choose from | For additional samples call 1.800.765.6699.</p>
                    <p class="text-smaller">Due to variances in monitors, the colors and patterns displayed may vary slightly from the actual product. Physical samples should be ordered prior to specifying.</p>
                </div>

            </div>
        </section>

        <? require_once '../common/footer.php' ?>

        <script src="/js/vendor/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>

        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/finishes/finishes.js"></script>
    </body>
</html>