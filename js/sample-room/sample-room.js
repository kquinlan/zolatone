angular.module('sampleRoom', [])

.controller('sampleRoomCtrl', function($scope, $http) {

	// Get all colors file
	$http({
		method: 'GET', 
		url: '/sample-room/getUserSamples.php'
	}).
    success(function(data, status, headers, config) {
    	$scope.userColors = data;
    });

});