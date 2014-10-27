<div class="small-margin-bottom-2">

    <!-- User Colors -->
    <div ng-hide="editColorCard || orderSamplesForm" class="large-8 medium-9 small-centered columns">
        <div class="color-thumb" ng-repeat="color in userColors" style="cursor: pointer;">
            <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}" ng-click="(colorCardMode || orderSamplesMode) ? addToColorCard(color) : return">
            	<h1 ng-show="color.isAdded" class="glyph color-primary left small-margin-0">&#x2713;</h1>
            </div>

            <p class="color-primary text-smaller"><b>{{ color.name }}</b><a class="right" ng-hide="colorCardMode || orderSamplesMode" ng-click="deleteSample(color.id)"><b>Remove</b></a></p>
            <p class="color-primary text-smaller right small-margin-0"></p>
        </div>
    </div>

    <div class="selected-counter text-center small-padding-1 border-primary-bottom" ng-show="(colorCardMode || orderSamplesMode) && !editColorCard && !orderSamplesForm">
        <h4 class="small-margin-0">{{ selectedColors.length }} colors selected</h4>
        <label ng-show="(selectedColors.length % 9 !== 0 || selectedColors.length === 0) && !orderSamplesMode" class="text-smaller color-primary small-margin-0"><i>Must be a multiple of 9</i></label>
    </div>

    <div class="selected-counter text-center small-padding-1 border-primary-bottom" ng-show="colorCardMode && editColorCard">
        <label class="text-smaller color-primary small-margin-0"><i>Drag and drop colors to rearrange your card.</i></label>
    </div>

    <!-- Order Samples Form -->
    <div ng-show="orderSamplesForm" class="medium-8 small-11 columns small-centered small-padding-top-2 small-padding-bottom-1">
        <form name="orderSamples" class="brochure" ng-submit="orderColors(orderInfo, selectedColors)">
            <div class="small-6 columns small-padding-0">
                <input ng-model="orderInfo.fname" type="text" placeholder="First Name" ng-required="true" required />
            </div>

            <div class="small-6 columns small-padding-0">
                <input ng-model="orderInfo.lname" type="text" placeholder="Last Name" ng-required="true" required />
            </div>

            <div class="small-12 columns small-padding-0">
                <input ng-model="orderInfo.company" type="text" placeholder="Company" ng-required="true" required />
            </div>

            <div class="small-12 columns small-padding-0">
                <input ng-model="orderInfo.tel" type="tel" placeholder="Phone" ng-required="true" required />
            </div>

            <div class="small-12 columns small-padding-0">
                <input ng-model="orderInfo.address1" type="text" placeholder="Address 1" ng-required="true" required />
            </div>

            <div class="small-12 columns small-padding-0">
                <input ng-model="orderInfo.address2" type="text" placeholder="Address 2" />
            </div>

            <div class="small-6 columns small-padding-0">
                <input ng-model="orderInfo.city" type="text" placeholder="City" ng-required="true" required />
            </div>

            <div class="small-3 columns small-padding-0">
                <input ng-model="orderInfo.state" type="text" placeholder="State" maxlength="2" onkeyup="javascript:this.value=this.value.toUpperCase();" ng-required="true" required />
            </div>

            <div class="small-3 columns small-padding-0">
                <input ng-model="orderInfo.zip" type="text" placeholder="Zip" maxlength="5" ng-required="true" required />
            </div>

            <div class="small-12 columns small-padding-0">
                <textarea ng-model="orderInfo.instructions" placeholder="Special Instructions"></textarea>
            </div>

            <input type="submit" ng-disabled="!orderSamples.$valid" class="button small" value="Submit" />
            <button class="small" ng-click="exitColorCardMode()">Cancel</button>
        </form>
    </div>

    <!-- Selected for Color Card -->
    <div class="color-card large-8 medium-9 small-centered columns small-padding-top-1" ui-sortable ng-model="selectedColors" ng-show="editColorCard" style="cursor: move;">
        <div class="color-thumb" ng-repeat="color in selectedColors">
            <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
            <p class="color-primary text-smaller"><b>{{ color.name }}</b></p>
        </div>
    </div>

    <p class="text-center small-margin-0" ng-show="userColors.length === 0">You have no saved samples yet.</p>

    <div class="large-8 medium-9 small-centered columns text-center small-margin-top-2">
    	<label ng-show="userColors.length < 9" class="text-smaller color-primary small-margin-bottom-1"><i>You must have 9 or more samples saved to create a Color On Demand Card.</i></label>
        <a class="button small small-margin-right-1" ng-hide="colorCardMode || orderSamplesMode" ng-click="orderSamplesMode = true">Order 4 X 5 Samples</button>
    	<a href="#" class="button small" ng-hide="colorCardMode || orderSamplesMode" ng-click="colorCardMode = true" ng-disabled="userColors.length < 9">Create Color On Demand Card</a>
        <a ng-hide="editColorCard || orderSamplesMode" href="/sample-room/color-cards/" class="button small">View Saved Color On Demand Cards</a>
    	
        <fieldset ng-show="orderSamplesMode && !orderSamplesForm" class="small-padding-top-1">
            <legend class="text-smaller">Your 4x5 Samples Order:</legend>
            <label ng-hide="orderSamplesForm" class="text-smaller color-primary small-margin-bottom-1"><i>Click samples above to add to your order.</i></label>
            <a class="button small" ng-disabled="selectedColors.length === 0" ng-click="orderSamplesForm = true;">Order</a>
            <button class="small" ng-click="exitColorCardMode()">Cancel</button>        
        </fieldset>

        <fieldset ng-show="colorCardMode" class="small-padding-top-1">
            <legend class="text-smaller">Your Color On Demand Card:</legend>
        	<label ng-hide="editColorCard" class="text-smaller color-primary small-margin-bottom-1"><i>Click samples above to add to your Color On Demand Card.</i></label>
            <form ng-hide="editColorCard" name="cardName" class="small-margin-0">
                <input class="text-center" ng-required="true" required title="Please name your color card" ng-disabled="selectedColors.length % 9 !== 0 || selectedColors.length === 0" type="text" maxlength="50" placeholder="Name Your Color Card" ng-model="colorCardName"/>
                <a href type="submit" class="button small" ng-disabled="selectedColors.length % 9 !== 0 || selectedColors.length === 0 || !cardName.$valid" ng-click="editColorCard = true">Continue</a>
                <button class="small" ng-click="exitColorCardMode()">Cancel</button>
            </form>
            <a class="button small" ng-show="editColorCard" ng-click="createUserColorCard(selectedColors)">Save</a>
            <button class="small" ng-show="editColorCard" ng-click="exitColorCardMode()">Cancel</button>      	
        </fieldset>
    </div>

</div>