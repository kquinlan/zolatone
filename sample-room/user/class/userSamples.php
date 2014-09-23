<div class="small-margin-bottom-2">
    <div class="color-thumb small-6 medium-4 large-4 columns left" ng-repeat="color in userColors">
    	<!-- User Colors -->
        <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}" ng-click="colorCardMode ? addToColorCard(color) : return">
        	<h1 ng-show="color.isAdded" class="glyph color-primary left small-margin-0">&#x2713;</h1>
        </div>

        <p class="color-primary text-smaller"><b>{{ color.name }}</b><a class="right" ng-hide="colorCardMode" ng-click="deleteSample(color.id)"><b>Remove</b></a></p>
        <p class="color-primary text-smaller right small-margin-0"></p>
    </div>

    <p class="text-center small-margin-0" ng-show="userColors.length === 0">You have no saved samples yet.</p>

    <div class="small-12 columns text-center">
    	<label ng-show="userColors.length < 9" class="text-smaller color-primary"><i>You must have 9 or more samples saved to create a Color On Demand Card.</i></label>
    	<button class="small-margin-0" ng-hide="colorCardMode" ng-click="colorCardMode = true" ng-disabled="userColors.length < 9">Create Color On Demand Card</button>
    	
    	<label ng-show="colorCardMode" class="text-smaller color-primary"><i>Select samples above to add to your Color On Demand Card.</i></label>
    	<button class="small-margin-0" ng-show="colorCardMode" ng-disabled="colorCardColors.length % 9 !== 0 || colorCardColors.length === 0">Continue</button>
    	<button class="small-margin-0" ng-show="colorCardMode" ng-click="exitColorCardMode()">Cancel</button>
    </div>
</div>