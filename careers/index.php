<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Careers</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides empty">
            <li>
                <section class="content">
                    <div class="text-center">
                        <h2 class="color-white no-shadow"><b>Your Future<br />With Zolatone</b></h2>
                    </div>
                </section>
            </li>
        </ul>

        <!-- Careers -->
        <section class="row small-margin-bottom-4">
            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Careers</h1>
                <p>We are looking to expand our sales team! Zolatone needs motivated people to spread the word about our wold-class finishes. If you are an energetic sales professional and you would like to be a part of our team, please send a resume and cover letter to <a href="mailto:careers@mastercoating.com">careers@mastercoating.com</a></p>
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