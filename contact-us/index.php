<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Contact Us</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides">
            <li class="lluminations">
                <section class="content">
                    <div class="text-center">
                        <h2 class="color-white"><b>Call Us Today</b></h2>
                    </div>
                </section>
            </li>
        </ul>

        <!-- Contact Us -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Contact Us</h1>
                <p>Want more information, or a friendly person to talk to? Feel free to call our customer service team located in Eagan Minnesota. We can answer any questions you might have, or direct you to your local distributor.</p>
                <h3 class="color-primary border-primary-top small-margin-top-3">Master Coating Technologies</h3>

                <p class="small-margin-0 text-smaller">
                    Toll Free / <a href="tel:+18007656699">1.800.765.6699</a>
                </p>
                <p class="small-margin-0 text-smaller">
                    International / <a href="tel:+16513325350">1.651.332.5350</a>
                </p>
                <p class="small-margin-0 text-smaller">
                    Fax / 651.414.6266
                </p>
                <p class="small-margin-0 text-smaller">
                    Email / <a href="mailto:info@zolatone.com">info@zolatone.com</a>
                </p>

                <div class="large-12 columns small-padding-0 small-margin-top-3">
                    <a href="/where-to-buy" class="button">Who is My Distributor?</a>
                </div>
            </div>

        </section>

        <? require_once '../common/footer.php' ?>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
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