<div class="small-12 columns small-margin-bottom-2">
    <div class="color-thumb small-6 medium-4 large-4 columns left" ng-repeat="color in userColors">
        <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
        <p class="color-primary text-smaller">{{ color.name }} <a class="right" ng-click="deleteSample(color.id)">Remove</a></p>
        <p class="color-primary text-smaller right small-margin-0"></p>
    </div>
    <p class="text-center small-margin-0" ng-show="userColors.length === 0">You have no saved samples yet.</p>
</div>