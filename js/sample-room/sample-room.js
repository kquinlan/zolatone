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

	$scope.selectedColors = [];

	// Select colors for the color card
	$scope.addToColorCard = function(color) {
		if(!color.isAdded) {
			$scope.selectedColors.push(color);
			color.isAdded = true;
		} else {
			$scope.selectedColors.splice($scope.selectedColors.indexOf(color), 1);
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
		$scope.selectedColors = [];
		$scope.colorCardMode = false;
		$scope.colorCardName = '';
		$scope.editColorCard = false;
	}

	// Create the color card instance on the DB
	$scope.createUserColorCard = function(selectedColors) {
		$scope.colorCardColorIds = [];

		selectedColors.forEach(function(color) {
			$scope.colorCardColorIds.push(color.id);
		})

		var newColorCard = {
			'selectedColors': $scope.colorCardColorIds,
			'colorCardName': $scope.colorCardName
		};

		// Get selected colors and pass to script
		$http({
			method: 'POST', 
			url: '/sample-room/user/class/createUserColorCard.php',
			data: $.param({'newColorCard': newColorCard}),
    		headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).
	    success(function(data, status, headers, config) {
	    	$window.location.href = '/sample-room/color-cards/';
	    });
	}

})