angular.module('colorCards', [])

.controller('colorCardsCtrl', function($scope, $http, $element) {

	// Assign the selected color card on click
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

	//Get all color cards
	var getColorCards = function() {
		// Get logged in user's samples
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/getUserColorCards.php'
		}).
	    success(function(data, status, headers, config) {
	    	$scope.userColorCards = data;
	    	
	    	var last = $scope.userColorCards.length - 1;
    		$scope.selectColorCard($scope.userColorCards[last]);
	    });
	}

	getColorCards();

    $scope.showAllBoards = true;

    // Delete color card
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

    // Order color card
    $scope.orderColorCard =  function(orderInfo) {
		// Update the scope from the markup
    	$scope.orderInfo = orderInfo;
    	$scope.orderInfo.selectedColorCardId = $scope.selectedColorCard.id;

    	$http({
			method: 'POST',
			url: '/sample-room/user/class/orderColorCard.php',
			data: $.param({'orderInfo': $scope.orderInfo}),
    		headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).
	    success(function(data, status, headers, config) {
	    	$scope.orderMode = false;
	    });
    }
})