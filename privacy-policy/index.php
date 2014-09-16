<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | FAQ</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>
    <body>

        <? require_once '../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>Privacy Policy</b></h2>
                </div>
            </section>

            <? require_once '../common/slider.php' ?>
        </div>

        <!-- Frequently Asked Questions -->
        <section class="row small-margin-bottom-4">

            <div class="medium-8 small-11 columns small-centered small-padding-top-4 small-padding-bottom-1">
                <h1 class="color-primary text-center small-margin-bottom-1">Our Commitment to Privacy</h1>
                <p>Your privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices and the choice you can make about the way your information is collected and used. To make this notice easy to find, we make it available in our footer and at every point where personally identifiable information may be requested.</p>
                
                <h4 class="color-primary border-primary-top small-margin-top-3">The Information We Collect:</h4>
                <p class="small-margin-0">This notice applies to all information collected or submitted on the Zolatone website. On some pages, you can register to receive materials. The types of personal information collected tat these pages are:</p>
                <ul class="small-margin-top-1">
                    <li>Name</li>
                    <li>Address</li>
                    <li>Company</li>
                    <li>Email address</li>
                    <li>Phone number</li>
                </ul>

                <h4 class="color-primary border-primary-top small-margin-top-3">The way we use information:</h4>
                <ul>
                    <li class="small-margin-top-1">We use the information you provide about yourself when placing an order only to complete that order. We do not share this information with outside parties except to the extent necessary to complete that order.</li>
                    <li class="small-margin-top-1">We use the information you provide about someone else when placing an order only to ship the product and to confirm delivery. We do not share this information with outside parties except to the extent necessary to complete that order</li>
                    <li class="small-margin-top-1">We use return email addresses to answer the email we receive. Such addresses are not used for any other purpose and are not shared with outside parties. You can register with our website if you would like to receive updates on our new products and services.</li>
                    <li class="small-margin-top-1">We use non-identifying and aggregate information to better design our website, marketing materials, products and services.</li>
                    <li class="small-margin-top-1">Finally, we never use or share the personally identifiable information provided to use online in ways unrelated to the ones described above without also providing you an opportunity to opt-out or otherwise prohibit such unrelated uses.</li>
                </ul>
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