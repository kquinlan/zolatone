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
			var init = 0;
			for(var i = 0; i < $scope.number; i++) {
				var obj = data.splice(init, 9);
				init = init + 9 * i;
				$scope.colorCardSamples.push(obj);
			}

			console.log(obj);
			console.log($scope.colorCardSamples);

	    });
    }

    

})