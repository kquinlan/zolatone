<div class="small-margin-bottom-2">

    <!-- User Colors -->
    <div ng-hide="editColorCard" class="large-8 medium-9 small-centered columns">
        <div class="color-thumb" ng-repeat="color in userColors">
            <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}" ng-click="colorCardMode ? addToColorCard(color) : return">
            	<h1 ng-show="color.isAdded" class="glyph color-primary left small-margin-0">&#x2713;</h1>
            </div>

            <p class="color-primary text-smaller"><b>{{ color.name }}</b><a class="right" ng-hide="colorCardMode" ng-click="deleteSample(color.id)"><b>Remove</b></a></p>
            <p class="color-primary text-smaller right small-margin-0"></p>
        </div>
    </div>

    <div class="color-card small-padding-top-1" ui-sortable ng-model="colorCardColors" ng-show="editColorCard">
        <div class="color-thumb" ng-repeat="color in colorCardColors">
            <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
            <p class="color-primary text-smaller"><b>{{ color.name }}</b></p>
        </div>
    </div>

    <p class="text-center small-margin-0" ng-show="userColors.length === 0">You have no saved samples yet.</p>

    <div class="large-8 medium-9 small-centered columns text-center small-margin-top-2">
    	<label ng-show="userColors.length < 9" class="text-smaller color-primary small-margin-bottom-1"><i>You must have 9 or more samples saved to create a Color On Demand Card.</i></label>
        <button class="small" ng-hide="colorCardMode">Order 4 X 5 Samples</button>
    	<button class="small" ng-hide="colorCardMode" ng-click="colorCardMode = true" ng-disabled="userColors.length < 9">Create Color On Demand Card</button>
        <a ng-hide="editColorCard" href="/sample-room/color-cards/" class="button small">View Saved Color On Demand Cards</a>
    	
        <fieldset ng-show="colorCardMode">
            <legend class="text-smaller">Your Color On Demand Card:</legend>
        	<label ng-hide="editColorCard" class="text-smaller color-primary small-margin-bottom-1"><i>Click samples above to add to your Color On Demand Card.<br>Must be a multiple of 9</i></label>
            <form ng-hide="editColorCard" name="cardName" class="small-margin-0">
                <input class="text-center" ng-required="true" required title="Please name your color card" ng-disabled="colorCardColors.length % 9 !== 0 || colorCardColors.length === 0" type="text" maxlength="50" placeholder="Name Your Color Card" ng-model="colorCardName"/>
                <input type="submit" ng-model="colorCardName" value="Continue" class="button small" ng-disabled="colorCardColors.length % 9 !== 0 || colorCardColors.length === 0 || !cardName.$valid" ng-click="editColorCard = true" />
                <button class="small" ng-click="exitColorCardMode()">Cancel</button>
            </form> 
            <button class="small" ng-show="editColorCard" ng-click="createUserColorCard(colorCardColors)">Save</button>
            <button class="small" ng-show="editColorCard">Order</button>
            <button class="small" ng-show="editColorCard" ng-click="exitColorCardMode()">Cancel</button>      	
        </fieldset>
    </div>

</div>