<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

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

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>We’re Just a Call<br />or Email Away</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

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
                    <a href="/where-to-buy" class="button small">Who is My Distributor?</a>
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

        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-15965138-1");
                pageTracker._trackPageview();
            } catch(err) {}
        </script>
    </body>
</html>