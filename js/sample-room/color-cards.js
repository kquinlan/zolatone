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
	    	$scope.colorCardSamples = data;
	    	$scope.showAllBoards = false;

	    	$scope.number = $scope.colorCardSamples.length / 9;
			$scope.getNumber = function(num) {
			    return new Array(num);   
			}
	    });
    }

    

})