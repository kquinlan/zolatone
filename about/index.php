<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zolatone | About Us</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <ul class="rslides">
            <li class="county-fair">
                <? require '../common/about-us.php' ?>
            </li>
            <li class="city-lights">
                <? require '../common/about-us.php' ?>
            </li>
        </ul>

        <!-- Multi-color graphics -->
        <section class="row small-padding-top-4 small-padding-bottom-2 small-8 large-6">

            <div class="small-12 medium-6 columns">
                <object data="/img/multi-color1.svg">
                    <img src="/img/multi-color1.jpg" />
                </object>
                <p class="text-center text-smaller color-primary"><b>SUSPENDED PAINT PARTICLES</b></p>
            </div>

            <div class="small-12 medium-6 columns">
                <object data="/img/multi-color2.svg">
                    <img src="/img/multi-color2.png" />
                </object>
                <p class="text-center text-smaller color-primary"><b>FINAL SPRAYED PRODUCT</b></p>
            </div>    

        </section>

        <!-- Why Multi-color? -->
        <section class="row content-border">
            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-4">
                <h1 class="color-primary text-center small-margin-bottom-1">Why Multi-color?</h1>
                <p>It’s been said that there are no straight lines in nature. Well, there aren’t truly solid colors in nature either. Color is naturally comprised of many shades and variations of tone. Mottled textures and various components reveal themselves when colors are viewed up close.</p>
                <p>Zolatone multicolor paint works on a similar principle. Layered and tactile particles of color add visual interest up close but appear solid when viewed at a distance. Zolatone achieves this effect by suspending tiny balls of color within the paint. These paint particles explode on impact when applied creating a one-of-a-kind look that appears natural and conceals the scuffs and stains that occur in high traffic areas.</p>
            </div>    
        </section>

        <!-- Product Highlights -->
        <section class="row small-11 large-8 small-padding-top-2">

            <div class="small-12 medium-6 columns small-padding-top-1">
                <div class="small-4 columns small-padding-0">
                    <object data="/img/graph.svg">
                        <img src="/img/graph.png" />
                    </object>
                </div>

                <div class="small-8 columns left" style="max-width: 200px">
                    <p class="text-smaller small-padding-top-1">Outstanding durability, unmatched quality, and beautiful finishes make Zolatone the number one choice for projects large or small</p>
                </div>    
            </div>

            <div class="small-12 medium-6 columns small-padding-top-1">
                <div class="small-4 columns small-padding-0">
                    <object data="/img/paint.svg">
                        <img src="/img/paint.png" />
                    </object>
                </div>

                <div class="small-8 columns left" style="max-width: 200px">
                    <p class="text-smaller small-padding-top-1" >All of our finishes are low VOC and LEED compliant</p>
                </div>    
            </div>    

        </section>

        <section class="row small-11 large-8 small-padding-bottom-4">

            <div class="small-12 medium-6 columns small-padding-top-1">
                <div class="small-4 columns small-padding-0">
                    <object data="/img/phone.svg">
                        <img src="/img/phone.png" />
                    </object>
                </div>

                <div class="small-8 columns left" style="max-width: 200px">
                    <p class="text-smaller small-padding-top-1">Our friendly and knowledgeable customer service staff answers 252 calls on average a day</p>
                </div>    
            </div>

            <div class="small-12 medium-6 columns small-padding-top-1">
                <div class="small-4 columns small-padding-0">
                    <object data="/img/minnesota.svg">
                        <img src="/img/minnesota.png" />
                    </object>
                </div>

                <div class="small-8 columns left" style="max-width: 200px">
                    <p class="text-smaller small-padding-top-1">Made in Minnesota at Master Coating Technologies</p>
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