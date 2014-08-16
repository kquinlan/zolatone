<!-- index.php -->
<!DOCTYPE html>
<html lang="en" ng-app="zipCodes">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Where to Buy</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides empty">
            <li>
                <section class="content">
                    <div class="text-center">
                        <h2 class="color-white no-shadow"><b>Where to Buy</b></h2>
                    </div>
                </section>
            </li>
        </ul>

        <!-- Where to Buy -->
        <section class="row">
            <div class="medium-8 small-11 columns small-centered small-padding-top-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Where to Buy</h1>
                <p>Buying our coatings is simple, just call our friends that distribute our product in your state. Start your journey to better walls. Enter your Zip Code below to locate your distributor.</p>
            </div>
        </section>

        <!-- Map Graphic -->
        <section class="row small-margin-bottom-2">
            <div class="medium-8 small-11 columns small-centered">
                <object data="/img/map.svg">
                    <img src="/img/map.png" />
                </object>
            </div>
        </section>

        <!-- Zip Code Field -->
        <section ng-controller="zipCodesCtrl" class="row">
            <div class="medium-8 small-11 columns small-centered">
                <form name="zipCode" class="zip-code-form">
                    <div class="small-12 medium-5 columns">
                        <input type="tel" placeholder="Zip Code" ng-required="true" maxlength="5" ng-model="zipSearch" ng-pattern="/^(\d{5}(-\d{4})?|[A-Z]\d[A-Z] *\d[A-Z]\d)$/" />
                    </div>
                </form>

                <div ng-show="zipCode.$valid" class="small-12 medium-7 columns distributor">
                    <div ng-repeat="distributor in distributors | filter:zipSearch" class="small-padding-bottom-2">
                        <h4>{{ distributor.name }}</h4>
                        <p class="small-margin-0" ng-repeat="addressLine in distributor.address">{{ addressLine }}</p>
                        <p class="small-margin-0">{{ distributor.phone }}</p>
                        <p class="small-margin-0">
                            <a ng-href="{{ distributor.url }}" class="small-margin-0">{{ distributor.url }}</a>
                        </p>
                    </div>
                </div>
                <hr />
            </div>
        </section>

        <!-- International -->
        <section class="row">
            <div class="medium-8 small-11 columns small-centered small-padding-top-1 small-padding-bottom-4">
                
                <h1 class="color-primary text-center small-margin-bottom-1">International</h1>
                <p>Not in the USA? No problem, contact one of our distributors near you below.</p>
                    
                <div class="small-12 medium-6 large-4 columns left small-padding-bottom-2">
                    <p class="small-margin-0"><b>Architectural Options</b></p>
                    <p class="small-margin-0 text-smaller">PMB 162</p>
                    <p class="small-margin-0 text-smaller">405 Ave Esmeralda, Ste 2</p>
                    <p class="small-margin-0 text-smaller">Guaynabo</p>
                    <p class="small-margin-0 text-smaller">Puerto Rico</p>
                    <p class="small-margin-0 text-smaller">1.866.683.9650</p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-bottom-2">
                    <p class="small-margin-0"><b>Kristal</b></p>
                    <p class="small-margin-0 text-smaller">7 Hadafina St.</p>
                    <p class="small-margin-0 text-smaller">Moshav Rishpon 46915</p>
                    <p class="small-margin-0 text-smaller">Israel</p>
                    <p class="small-margin-0 text-smaller">+972.9.95.9519663</p>
                    <p class="small-margin-0 text-smaller">
                        <a href="http://www.kristalpaint.com/" class="small-margin-0">www.kristalpaint.com</a>
                    </p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-bottom-2">
                    <p class="small-margin-0"><b>The Woeller Group</b></p>
                    <p class="small-margin-0 text-smaller">200 Trillium Drive, Kitchener</p>
                    <p class="small-margin-0 text-smaller">Ontario, Canada N2E 1X7</p>
                    <p class="small-margin-0 text-smaller">877.963.5537</p>
                    <p class="small-margin-0 text-smaller">
                        <a href="http://www.woeller.com/" class="small-margin-0">www.woeller.com</a>
                    </p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-bottom-2">
                    <p class="small-margin-0"><b>Zone Architectural Products</b></p>
                    <p class="small-margin-0 text-smaller">4A Edwin St</p>
                    <p class="small-margin-0 text-smaller">Mount Eden</p>
                    <p class="small-margin-0 text-smaller">Auckland</p>
                    <p class="small-margin-0 text-smaller">New Zealand</p>
                    <p class="small-margin-0 text-smaller">0800.508.800</p>
                    <p class="small-margin-0 text-smaller">
                        <a href="http://www.zonenz.net.nz/" class="small-margin-0">www.zonenz.net.nz</a>
                    </p>
                </div>

            </div>
        </section>

        <? require_once '../common/footer.php' ?>

        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/zip-codes/zip-codes.js"></script>
        <script>
            // Optional params for foundation
            $(document).foundation();

            // Enhance responsiveness on mobile
            $(function() {
                FastClick.attach(document.body);
            });

            // Slider parameters
            $(".rslides").responsiveSlides({
                auto: true,             // Boolean: Animate automatically, true or false
                speed: 1500,            // Integer: Speed of the transition, in milliseconds
                timeout: 6000,          // Integer: Time between slide transitions, in milliseconds
                pager: false,           // Boolean: Show pager, true or false
                nav: false,             // Boolean: Show navigation, true or false
                random: false,          // Boolean: Randomize the order of the slides, true or false
                pause: false,           // Boolean: Pause on hover, true or false
                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                prevText: "Previous",   // String: Text for the "previous" button
                nextText: "Next",       // String: Text for the "next" button
                maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                manualControls: "",     // Selector: Declare custom pager navigation
                namespace: "rslides",   // String: Change the default namespace used
                before: function(){},   // Function: Before callback
                after: function(){}     // Function: After callback
            });

        </script>
    </body>
</html>