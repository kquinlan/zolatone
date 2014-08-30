<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Request a Free Brochure</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>Inspiration For Your<br />Next Project</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Our Mission -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Ideas</h1>
                <p>Need some inspiration for your next project? Wether it’s large or small, Zolatone has plenty of possibilities to fit your every need. Check out the gallery below for some ideas! Click images to view larger.</p>
            </div>

            <div class="small-11 columns small-centered small-padding-bottom-1">
                <div class="text-center">

                    <div class="gallery-thumb landscape" style="background-image: url('/img/gallery/alamo-plaza.jpg');"></div>

                    <div class="gallery-thumb portrait" style="background-image: url('/img/gallery/school-lobby.jpg');"></div>
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
    </body>
</html>