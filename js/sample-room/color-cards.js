angular.module('colorCards', [])

.controller('colorCardsCtrl', function($scope, $http, $element) {

	// Get logged in user's samples
	$http({
		method: 'GET', 
		url: '/sample-room/user/class/getUserColorCards.php'
	}).
    success(function(data, status, headers, config) {
    	$scope.userColorCards = data;
    	console.log(data);
    });

})