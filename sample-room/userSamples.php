<div class="small-12 columns small-margin-bottom-2">
    <div class="color-thumb small-6 medium-4 large-4 columns left" ng-repeat="color in userColors" ng-click="deleteSample(color.id)">
        <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
        <p class="color-primary text-smaller">{{ color.name }}</p>
        <p class="color-primary text-smaller right small-margin-0"><a>Remove</a></p>
    </div>
    <p class="text-center small-margin-0" ng-show="userColors.length === 0">You have no saved samples yet.</p>
</div>