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
                    <h2 class="color-white"><b>Request a Free Brochure</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Our Mission -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Request a Free Brochure</h1>
                <p>Want to share Zolatone with someone you know? Order this handy overview that includes tons of information and samples. If you would like information on our Light Vision glow-in-the-dark safety additive, please note this in the special instructions.</p>
            </div>

            <div class="small-11 columns small-centered">
                <div class="medium-6 small-12 columns small-padding-bottom-4">
                    <img src="/img/brochure.jpg">
                </div>

                <form class="brochure">
                    <div class="medium-6 small-12 columns">
                        <div class="small-6 columns small-padding-0">
                            <input type="text" placeholder="First Name" required />
                        </div>

                        <div class="small-6 columns small-padding-0">
                            <input type="text" placeholder="Last Name" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input type="email" placeholder="Email" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input type="text" placeholder="Company" />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input type="text" placeholder="Address 1" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input type="text" placeholder="Address 2" required />
                        </div>

                        <div class="small-6 columns small-padding-0">
                            <input type="text" placeholder="City" required />
                        </div>

                        <div class="small-3 columns small-padding-0">
                            <input type="text" placeholder="State" maxlength="2" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                        </div>

                        <div class="small-3 columns small-padding-0">
                            <input type="text" placeholder="Zip" maxlength="5" required />
                        </div>

                        <input type="submit" class="button" value="Submit" />
                    </div>
                </form>
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