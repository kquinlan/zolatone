<div class="small-12 columns small-margin-bottom-2">
    <div class="color-thumb small-4 medium-4 large-4 columns left" ng-repeat="color in userColors | orderBy:'name'">
        <div ng-style="{'background-image':'url(/img/samples/thumbs/' + color.name + '.jpg)'}"></div>
        <span class="color-primary text-smaller">{{ color.name }}</span>
    </div>
</div>