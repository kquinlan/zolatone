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

                <nav class="finishes text-center">
                    <ul>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'counterpointe' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/counterpointe">Counterpointe</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'lluminations' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/lluminations">Lluminations</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'metal' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/metal">Metal</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'polomyx' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/polomyx">Polomyx</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'polomyx-airless' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/polomyx-airless">Polomyx Airless</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'flex' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/flex">Flex</a></li>
                        <li ng-class="{ 'color-primary border-primary-bottom': search.finish === 'light-vision' }" ng-init="search.finish = search.finish" ng-click="toStart(); search.finish = search.finish"><a href="#/light-vision">Light Vision</a></li>
                    </ul>
                </nav>
            
                <form name="colorFilter">
                    <div class="small-12 columns small-margin-top-2">
                        <div class="medium-4 columns small-padding-bottom-1">
                            
                            <input ng-required="true" maxlength="15" ng-model="search.name" ng-change="toStart()" class="small-margin-top-1 small-margin-bottom-0" type="text" placeholder="Search..." />
                            <label class="text-smaller">Search all colors by name i.e. ‘PFX-10287’</label>
                            <div ng-show="colorFilter.$valid" class="border-primary-bottom small-padding-1">
                                <p class="small-margin-0 text-smaller" style="padding: 0.25em;" ng-repeat="color in colors | filter:search:strict | orderBy:'name' | limitTo : 5"><a ng-click="select(color); search.name = ''" ng-href="/finishes/#/{{ color.finish }}">{{ color.name }}</a></p>
                                <p class="small-margin-0 text-smaller" ng-show="(colors | filter:search:strict).length === 0"><i>No results found.</i></p>
                            </div>
                        </div>

                        <div class="medium-2 columns">
                            <label class="text-smaller">Color:</label>
                            <select ng-model="search.color" ng-change="toStart()">
                                <option value="">All</option>
                                <option>Black</option>
                                <option>White</option>
                                <option>Gray</option>
                                <option>Red</option>
                                <option>Pink</option>
                                <option>Orange</option>
                                <option>Gold</option>
                                <option>Yellow</option>
                                <option>Brown</option>
                                <option>Green</option>
                                <option>Blue</option>
                                <option>Purple</option>
                            </select>
                        </div>

                        <div class="medium-2 columns">
                            <label class="text-smaller">Tone:</label>
                            <select ng-model="search.tone" ng-change="toStart()">
                                <option value="">All</option>
                                <option>Warm</option>
                                <option>Cool</option>
                            </select>
                        </div>

                        <div class="medium-2 columns">
                            <label class="text-smaller">Effect:</label>
                            <select ng-model="search.effect" ng-change="toStart()">
                                <option value="">All</option>
                                <option>Accent</option>
                                <option>Neutral</option>
                            </select>
                        </div>

                        <div class="medium-2 columns medium-text-center medium-padding-0 small-margin-bottom-1">
                            <label class="text-smaller medium-margin-top-2 small-margin-top-1">
                                <input ng-model="search.new" ng-change="toStart()" class="small-margin-0" type="checkbox" />
                                New Colors      
                            </label>
                        </div>
                    </div>

                </form>

            </div>

        </section>

        <!-- Finishes Selection -->
        <section class="row">
            <div class="small-11 columns small-centered small-padding-top-2">

                <div class="medium-5 columns small-padding-bottom-1">
                    <div class="selected-color" ng-style="{'background-image':'url(/img/samples/' + selectedColor.name + '.jpg)'}" style="padding-bottom: 97.77%;"></div>
                    <p class="color-primary left text-smaller small-margin-0" style="padding: 0.25em"><b>{{ selectedColor.name }}</b></p>
                    <p class="color-primary right text-smaller small-margin-0" style="padding: 0.25em"><b><a>Save to Sample Room</a></b></p>
                </div>

                <div class="medium-7 columns small-padding-0">

                    <div class="small-12 columns color-thumbs">
                        <div ng-click="select(color); search.name = ''" class="color-thumb small-4 medium-3 large-3 columns" ng-repeat="color in colors | filter:search:strict | orderBy:'name' | startFrom:currentPage * pageSize | limitTo:pageSize">
                            <a href="/finishes/#/{{ color.finish }}"><div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div></a>
                        </div>

                        <p class="text-smaller" ng-show="(colors | filter:search:strict).length === 0">Oh, no! We had trouble finding the color you're looking for. Please modify your search or contact our customer service team.</p>
                    </div>

                    <div class="text-center small-12 columns" ng-show="(colors | filter:search:strict).length > pageSize" class="clear">
                        <button class="arrow prev small left" ng-disabled="currentPage == 0" ng-click="prevPage()">&#9668;</button>
                        <button class="arrow next small right" ng-disabled="currentPage >= (colors | filter:search:strict).length / pageSize - 1" ng-click="nextPage()">&#9658;</button>
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