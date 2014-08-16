<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zolatone | LEED</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides empty">
            <li>
                <section class="content">
                    <div class="text-center">
                        <h2 class="color-white no-shadow"><b>LEED</b></h2>
                    </div>
                </section>
            </li>
        </ul>

        <!-- Our Mission -->
        <section class="row small-margin-bottom-4">
            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Our Mission</h1>
                <p>Since its founding in 1995, Master Coating Technologies has continually worked to make sure each and every product meets three criteria; highest possible performance, lowest possible environmental footprint and greatest possible design impact.</p>
                <p>Every Zolatone product contributes toward satisfying LEED credit EQ 4.2. Other credits may also be applicable depending on project and location and other factors (IAQ Management Plans, Low Environmental Cleaning Policies for instance).</p>
            </div>
            <div class="medium-8 small-11 columns small-centered small-padding-bottom-4">
                <h1 class="color-primary text-center small-padding-top-1 small-margin-bottom-1">From the Sun to your walls</h1>
                <p>When you use Zolatone, you are using a product created with Solar energy. Master Coating Technology’s corporate headquarters in Eagan, Minnesota is the third largest solar powered facility in the state. MCT’s commitment to clean energy and green product runs much deeper than simple endorsements and seals of approval. Download this PDF to read more about our environmental position and strategy.</p>
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