angular.module('sampleRoom', [])

.controller('sampleRoomCtrl', function($scope, $http, $element) {

	// Get logged in user's samples
	var getUserSamples = function() {
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/getUserSamples.php'
		}).
	    success(function(data, status, headers, config) {
	    	$scope.userColors = data;

	    	$scope.deleteSample = function(color) {
				// Get selected color and pass to script
				$http({
					method: 'GET', 
					url: '/sample-room/user/class/deleteSample.php?color=' + color 
				}).
			    success(function(data, status, headers, config) {
			    	getUserSamples();
			    });
			}
	    });
	};

	getUserSamples();

	$scope.colorCardColors = [];

	// Select colors for the color card
	$scope.addToColorCard = function(color) {
		if(!color.isAdded) {
			$scope.colorCardColors.push(color.id);
			color.isAdded = true;
		} else {
			$scope.colorCardColors.splice($scope.colorCardColors.indexOf(color.id), 1);
			color.isAdded = false;
		}
	}

	// Exit color card mode
	$scope.exitColorCardMode = function() {
		$scope.userColors.forEach(function(color) {
			if(color.isAdded) {
				color.isAdded = false;
			}
		});
		$scope.colorCardColors = [];
		$scope.colorCardMode = false;
	}

	$scope.createUserBoard = function(colorCardColors) {
		// Get selected colors and pass to script
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/createUserBoard.php?colorCardColors=' + colorCardColors + '&colorCardName=' + $scope.colorCardName
		}).
	    success(function(data, status, headers, config) {
	    });
	}

})