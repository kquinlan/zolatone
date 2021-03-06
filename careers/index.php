<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

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

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>Your Future<br />With Zolatone</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

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