<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en" ng-app="orderBrochure">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Request a Free Brochure</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body ng-controller="brochureCtrl">

        <? require_once '../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>Request a<br />Free Brochure</b></h2>
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

                <div class="medium-5 small-12 columns small-padding-bottom-4">
                    <img src="/img/overview-brochure.jpg">
                    <img src="/img/brochure.jpg">
                </div>

                <div class="medium-6 small-12 columns">

                    <form name="brochureForm" class="brochure" ng-submit="orderBrochure(brochureInfo)">
                        <div class="small-6 columns small-padding-0">
                            <input ng-model="brochureInfo.fname" type="text" placeholder="First Name" ng-required="true" required />
                        </div>

                        <div class="small-6 columns small-padding-0">
                            <input ng-model="brochureInfo.lname" type="text" placeholder="Last Name" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input ng-model="brochureInfo.company" type="text" placeholder="Company" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input ng-model="brochureInfo.email" type="email" placeholder="Email" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input ng-model="brochureInfo.tel" type="tel" placeholder="Phone" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input ng-model="brochureInfo.address1" type="text" placeholder="Address 1" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <input ng-model="brochureInfo.address2" type="text" placeholder="Address 2" />
                        </div>

                        <div class="small-6 columns small-padding-0">
                            <input ng-model="brochureInfo.city" type="text" placeholder="City" ng-required="true" required />
                        </div>

                        <div class="small-3 columns small-padding-0">
                            <input ng-model="brochureInfo.state" type="text" placeholder="State" maxlength="2" onkeyup="javascript:this.value=this.value.toUpperCase();" ng-required="true" required />
                        </div>

                        <div class="small-3 columns small-padding-0">
                            <input ng-model="brochureInfo.zip" type="text" placeholder="Zip" maxlength="5" ng-required="true" required />
                        </div>

                        <div class="small-12 columns small-padding-0">
                            <textarea ng-model="brochureInfo.instructions" placeholder="Special Instructions"></textarea>
                        </div>

                        <input type="submit" ng-disabled="!brochureForm.$valid" class="button small" value="Submit" />
                    </form>

                </div>
            </div>

        </section>

        <? require_once '../common/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/order-brochure/order-brochure.js"></script>

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