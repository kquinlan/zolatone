<!DOCTYPE html>
<html class="no-js" lang="en" ng-app>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zolatone | Welcome</title>
        <link rel="stylesheet" href="/css/foundation.css" />
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>

        <? require_once 'common/header.php' ?>

        <ul class="rslides">
            <li class="county-fair">
                <? require 'common/tagline.php' ?>
            </li>
            <li class="city-lights">
                <? require 'common/tagline.php' ?>
            </li>
        </ul>

        <!-- Our Story -->
        <section class="row">
            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Our Story</h1>
                <p>The Zolatone name has always represented quality and ingenuity. From our humble beginnings lining Airstream trailers and trunks of classic American cars, we’ve risen to become a valued creative partner for many of the worlds most prestigious architects and designers.</p>
                <p>Over the years our palettes may have changed (thankfully!) but our commitment to crafting durable interior paints never will. Our drive for innovation has led us to become one of the most environmentally forward-thinking paint manufacturers with an entire product line that is not only water based but also contributes to satisfying LEED credits.</p>
                <p>There’s always something new from Zolatone, with a paint to fit all your design needs. With 6 distinctive finishes and endless color options our multi fleck paint is sure to compliment any decorating scheme. Our past success and current innovations have us very excited about the years ahead!</p>
            </div>    
        </section>

        <? require_once 'common/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.15/angular.min.js"></script>
        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script>
            // Optional params for foundation
            $(document).foundation();

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

            // Subscribe panel display events
            $('.close').click(function() { $('.subscribe-panel').slideUp(); });
            $('.subscribe-button').click(function() { $('.subscribe-panel').slideDown(); });
        </script>
    </body>
</html>