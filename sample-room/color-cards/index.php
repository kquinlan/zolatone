<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); ?>

<!DOCTYPE html>
<html lang="en" ng-app="colorCards">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Saved Color Cards</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
        <link data-require="angular-sortable@0.0.1" data-semver="0.0.1" rel="stylesheet" href="http://cdn.sebastien.chartier.pro/angular-sortable/0.0.2/angular-sortable.css" />
    </head>
    <body ng-controller="colorCardsCtrl">

        <? require_once '../../common/header.php' ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h3 class="color-white"><b>Request Samples and Color Cards<br />For Your Next Project</b></h3>
                </div>
            </section>

            <? require_once '../../common/slider.php' ?>
        </div>

        <!-- Color Cards -->
        <section class="row small-padding-top-4 small-margin-bottom-4">

        <h1 class="color-primary text-center small-margin-bottom-1">Your Saved Color Cards</h1>

            <div ng-show="userColorCards.length < 1 && !orderMode" class="medium-8 small-11 columns small-centered small-padding-top-2 small-padding-bottom-1">
                <p>It looks like you don't have any saved Color On Demand cards. Head over to the sample room to create some.</p>
            </div>

            <div ng-hide="userColorCards.length < 1 || orderMode" class="medium-8 small-11 columns small-centered small-padding-top-2 small-padding-bottom-1">

                <!-- Color Cards List -->
                <button class="small small-12 small-margin-0 columns" ng-show="!showAllBoards" ng-click="showAllBoards = true">Show Cards List &#9662;</button>
                <button class="small small-12 small-margin-0 columns" ng-show="showAllBoards" ng-click="showAllBoards = false">Hide Cards List &#9652;</button>
                <table ng-show="showAllBoards" class="small-12 columns small-padding-0 small-margin-0">
                    <tr>
                        <th>Board Name:</th>
                        <th>Created On:</th>
                    </tr>
                    <tr ng-repeat="userColorCard in userColorCards">
                        <td><a ng-click="selectColorCard(userColorCard)">{{ userColorCard.name }}</a></td>
                        <td>{{ userColorCard.date_created }}</td>
                        <td class="text-right">
                            <a class="text-smaller" ng-hide="showConfirm" ng-click="showConfirm = true">Delete</a>
                            <span class="text-smaller" ng-show="showConfirm">
                                Are You Sure? 
                                <a ng-click="deleteColorCard(userColorCard)">Yes</a> |
                                <a ng-click="showConfirm = false">No</a>
                            </span>
                        </td>
                    </tr>
                </table>

                <!-- Selected Color Card -->
                <div class="color-card small-12 columns text-center small-padding-top-1" ng-show="userColorCard !== null" ng-repeat="subCard in getNumber(number) track by $index">

                    <div class="small-margin-bottom-1">
                        <h3 class="small-margin-bottom-0 color-primary">{{ selectedColorCard.name }}</h3>
                        <p class="card-page-count text-smaller small-margin-0" ng-show="number > 1">Card {{ $index + 1 }} of {{ number }}</p>
                    </div>

                    <div class="color-thumb text-left" ng-repeat="color in colorCardSamples[$index]">
                        
                        <!-- Board Colors -->
                        <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>

                        <p class="color-primary text-smaller"><b>{{ color.name }}</b></p>
                        <p class="color-primary text-smaller right small-margin-0"></p>

                    </div>

                </div>

                <button class="small small-12 columns" ng-click="orderMode = true">Order This Card</button>

            </div>

            <div ng-show="orderMode" class="medium-8 small-11 columns small-centered small-padding-top-2 small-padding-bottom-1">
                <form class="brochure" ng-submit="orderColorCard()">
                    <div class="small-6 columns small-padding-0">
                        <input ng-model="fname" type="text" placeholder="First Name" required />
                    </div>

                    <div class="small-6 columns small-padding-0">
                        <input ng-model="lname" type="text" placeholder="Last Name" required />
                    </div>

                    <div class="small-12 columns small-padding-0">
                        <input ng-model="tel" type="tel" placeholder="Phone" required />
                    </div>

                    <div class="small-12 columns small-padding-0">
                        <input ng-model="company" type="text" placeholder="Company" />
                    </div>

                    <div class="small-12 columns small-padding-0">
                        <input ng-model="address1" type="text" placeholder="Address 1" required />
                    </div>

                    <div class="small-12 columns small-padding-0">
                        <input ng-model="address2" type="text" placeholder="Address 2" required />
                    </div>

                    <div class="small-6 columns small-padding-0">
                        <input ng-model="city" type="text" placeholder="City" required />
                    </div>

                    <div class="small-3 columns small-padding-0">
                        <input ng-model="state" type="text" placeholder="State" maxlength="2" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                    </div>

                    <div class="small-3 columns small-padding-0">
                        <input ng-model="zip" type="text" placeholder="Zip" maxlength="5" required />
                    </div>

                    <div class="small-12 columns small-padding-0">
                        <textarea ng-model="instructions" placeholder="Special Instructions"></textarea>
                    </div>

                    <input type="submit" class="button small" value="Submit" />
                    <button class="small" ng-click="orderMode = false">Cancel</button>
                </form>
            </div>

            <!-- Sample Room Button -->
            <div class="small-12 columns text-center small-padding-top-1">
                <a class="button small" href="/sample-room">Take me to the Sample Room</a>
            </div>

        </section>

        <? require_once '../../common/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/sample-room/color-cards.js"></script>
    </body>
</html>