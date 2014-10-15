angular.module('orderBrochure', [])

.controller('brochureCtrl', function($scope, $http, $element) {

    // Order brochure
    $scope.orderBrochure =  function(brochureInfo) {
		// Update the scope from the markup
    	$scope.brochureInfo = brochureInfo;

    	$http({
			method: 'POST',
			url: '/sample-room/user/class/orderBrochure.php',
			data: $.param({'brochureInfo': $scope.brochureInfo}),
    		headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).
	    success(function(data, status, headers, config) {
	    	console.log(data);
	    });
    }
})