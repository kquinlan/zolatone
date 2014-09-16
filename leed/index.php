<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | LEED</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>From the Sun<br />to Your Walls</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Our Mission -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Our Mission</h1>
                <p>Since its founding in 1995, Master Coating Technologies has continually worked to make sure each and every product meets three criteria; highest possible performance, lowest possible environmental footprint and greatest possible design impact.</p>
                <p>Every Zolatone product contributes toward satisfying LEED credit EQ 4.2. Other credits may also be applicable depending on project and location and other factors (IAQ Management Plans, Low Environmental Cleaning Policies for instance).</p>
            </div>
            
            <div class="medium-8 small-11 columns small-centered">
                <h1 class="color-primary text-center small-padding-top-1 small-margin-bottom-1">From the Sun to your walls</h1>
                <p>When you use Zolatone, you are using a product created with Solar energy. Master Coating Technology’s corporate headquarters in Eagan, Minnesota is the third largest solar powered facility in the state. MCT’s commitment to clean energy and green product runs much deeper than simple endorsements and seals of approval. Download this PDF to read more about our environmental position and strategy.</p>
            </div>

            <div class="medium-8 small-12 columns small-centered text-center">
                <div class="leed-logo">
                    <object data="/img/USGBC.svg">
                        <img src="/img/USGBC.png" />
                    </object>
                </div>

                <div class="leed-logo">
                    <object data="/img/CGBC.svg">
                        <img src="/img/CGBC.png" />
                    </object>
                </div>

                <div class="small-12 columns">
                    <a href="" class="button small-margin-top-1">Download the PDF</a>
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