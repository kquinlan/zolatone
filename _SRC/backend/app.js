var app = angular.module('testJSON', []);

app.controller('getData', function($scope, $http) { 
	
	var getTasks = function () {
		$http({
			method: 'GET', 
			url: 'getTask.php'
		}).
	    success(function(data, status, headers, config) {
	    	$scope.boards = data;
	    	console.log(data);
	    }).
	    error(function(data, status, headers, config) {
	    	$scope.errorMessage = true;
	    });
	};

    $scope.addTask = function(board) {

    	// Update the scope from the markup
    	$scope.board = angular.copy(board);

    	console.log($scope.board);

    	// Call the addTask.php class asynchronously
    	$http({
    		method: 'POST', 
    		url: 'addTask.php',
    		data: $.param({'board': $scope.board}),
    		headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
    	}).
	    success(function(data, status, headers, config) {
	    	$scope.boards = data;
	    	getTasks();
	    	console.log(data);
	    }).
	    error(function(data, status, headers, config) {
	    	$scope.errorMessage = true;
	    });

	    // Reset the form data
	    $scope.board = {};
	    $scope.cancel();
    };

    $scope.cancel = function() {
    	$scope.showSave = false;
    };

    getTasks();

});