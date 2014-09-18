angular.module('sampleRoom', [])

.controller('sampleRoomCtrl', function($scope, $http) {

	// Get logged in user's samples
	var getUserSamples = function() {
		$http({
			method: 'GET', 
			url: '/sample-room/getUserSamples.php'
		}).
	    success(function(data, status, headers, config) {
	    	$scope.userColors = data;

	    	$scope.deleteSample = function(color) {
				// Get selected color and pass to script
				$http({
					method: 'GET', 
					url: '/finishes/deleteSample.php?color=' + color 
				}).
			    success(function(data, status, headers, config) {
			    	getUserSamples();
			    });
			}
	    });
	};

	getUserSamples();

});