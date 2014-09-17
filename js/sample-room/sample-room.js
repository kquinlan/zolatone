angular.module('sampleRoom', [])

.controller('sampleRoomCtrl', function($scope, $http) {

	// Get logged in user's samples
	$http({
		method: 'GET', 
		url: '/sample-room/getUserSamples.php'
	}).
    success(function(data, status, headers, config) {
    	$scope.userColors = data;
    });

});