angular.module('sampleRoom', ['ui.sortable'])

.controller('sampleRoomCtrl', function($scope, $http, $element, $window) {

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
			$scope.colorCardColors.push(color);
			color.isAdded = true;
		} else {
			$scope.colorCardColors.splice($scope.colorCardColors.indexOf(color), 1);
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
		$scope.colorCardName = '';
		$scope.editColorCard = false;
	}

	// Create the color card instance on the DB
	$scope.createUserColorCard = function(colorCardColors) {
		$scope.colorCardColorIds = [];

		colorCardColors.forEach(function(color) {
			$scope.colorCardColorIds.push(color.id);
		})
		// Get selected colors and pass to script
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/createUserColorCard.php?colorCardColors=' + $scope.colorCardColorIds + '&colorCardName=' + $scope.colorCardName
		}).
	    success(function(data, status, headers, config) {
	    	$window.location.href = '/sample-room/color-cards/';
	    });
	}

})