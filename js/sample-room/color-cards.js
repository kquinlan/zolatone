angular.module('colorCards', [])

.controller('colorCardsCtrl', function($scope, $http, $element) {

	var getColorCards = function() {
		// Get logged in user's samples
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/getUserColorCards.php'
		}).
	    success(function(data, status, headers, config) {
	    	$scope.userColorCards = data;
	    	console.log(data);
	    });
	}

	getColorCards();

    $scope.showAllBoards = true;

    $scope.selectColorCard = function(userColorCard) {
    	$scope.selectedColorCard = userColorCard;

    	$http({
			method: 'GET', 
			url: '/sample-room/user/class/getColorCardSamples.php?selectedColorCardId=' + $scope.selectedColorCard.id
		}).
	    success(function(data, status, headers, config) {
	    	$scope.showAllBoards = false;

	    	$scope.number = data.length / 9;
			$scope.getNumber = function(num) {
			    return new Array(num);   
			}

			// Split up larger boards (> 9 samples)
			$scope.colorCardSamples = [];
			for(var i = 0; i < $scope.number; i++) {
				var obj = data.splice(0, 9);
				$scope.colorCardSamples.push(obj);
			}
	    });
    }

    $scope.deleteColorCard = function(userColorCard) {
    	$scope.selectedColorCard = userColorCard;

    	$http({
			method: 'GET', 
			url: '/sample-room/user/class/deleteUserColorCard.php?selectedColorCardId=' + $scope.selectedColorCard.id
		}).
	    success(function(data, status, headers, config) {
	    	getColorCards();
	    });
    }
})