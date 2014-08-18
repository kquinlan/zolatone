<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Videos</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides">
            <li class="lluminations">
                <section class="content">
                    <div class="text-center">
                        <h2 class="color-white"><b>Videos</b></h2>
                    </div>
                </section>
            </li>
        </ul>

        <!-- Zolatone Video Resources -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Zolatone Video Resources</h1>
                <p>View these short videos to learn how easy it is to apply, repair and maintain Zolatone finishes.</p>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Counterpointe</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Lluminations</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Metal</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Polomyx</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Polomyx Airless</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Light Vision</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
                </div>

                <div class="small-12 medium-6 large-4 columns left small-padding-top-2">
                    <h4 class="color-primary">Flex</h4>
                    <hr />
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Application</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Touch Up / Spot Repair</a></p>
                    <p class="small-margin-0"><a class="text-smaller no-wrap" href="">Cleaning</a></p>
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