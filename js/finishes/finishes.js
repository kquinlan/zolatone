angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $rootScope, $http) {

	// Get all colors file
	$http({
		method: 'GET', 
		url: '/sample-room/user/class/getSamples.php'
	}).
    success(function(data, status, headers, config) {
    	$scope.colors = data;

    	// Get users colors to determine if any are already saved
		$http({
			method: 'GET', 
			url: '/sample-room/user/class/getUserSamples.php'
		}).
	    success(function(data, status, headers, config) {
	    	var userColors = data;

	    	$scope.colors.forEach(function(color) {
	    		userColors.forEach(function(userColor) {
	    			if(color.id === userColor.id) {
	    				color.isSaved = true;
	    			}
	    		})
	    	})

	    	// Save the sample selected
			$scope.saveSample = function(color) {
				// Get selected color and pass to script
				$http({
					method: 'GET', 
					url: '/sample-room/user/class/saveSample.php?color=' + color 
				}).
			    success(function(data, status, headers, config) {
			    	$scope.selectedColor.isSaved = true;
			    });
			}

			// Save the sample selected
			$scope.deleteSample = function(color) {
				// Get selected color and pass to script
				$http({
					method: 'GET', 
					url: '/sample-room/user/class/deleteSample.php?color=' + color 
				}).
			    success(function(data, status, headers, config) {
			    	$scope.selectedColor.isSaved = false;
			    });
			}
	    });
    });

    $scope.currentPage = 0; // Init page to load
    $scope.pageSize = 12; // Number of colors for each page

    // Navigate forward one page
	$scope.nextPage = function() {
		$scope.currentPage = $scope.currentPage + 1;
	}
	// Navigate back one page
	$scope.prevPage = function() {
		$scope.currentPage = $scope.currentPage - 1;
	}
	// Set pagination to start
	$scope.toStart = function() {
		$scope.currentPage = 0;
	}
	// Load color to enlarged square
	$scope.select = function(color) {
		$scope.selectedColor = color;
	}
	// Remove search filters based on form input
	$scope.toggleAll = function(finish) {
		$scope.search.finish = finish;

		$scope.$watch('colorFilter.$valid', function(validity) { 
			$scope.search.finish = validity ? '' : finish;
			$scope.search.color = '';
			$scope.search.tone = '';
			$scope.search.effect = '';
			$scope.toStart();
		});

		// Remove search filters based on filters selected
		$scope.toggleAllSelect = function() {
			$scope.search.finish = ($scope.search.color != 0 || $scope.search.tone != 0 || $scope.search.effect != 0) ? '' : finish;
			$scope.toStart();
		}
	}	
})

// Configure SPA routes
.config(['$routeProvider', function($routeProvider) {
	$routeProvider.
		when('/counterpointe', {
		templateUrl: 'partials/counterpointe.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('counterpointe');
		}
	}).
		when('/lluminations', {
		templateUrl: 'partials/lluminations.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('lluminations');
		}
	}).
		when('/metal', {
		templateUrl: 'partials/metal.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('metal');
		}
	}).
		when('/polomyx', {
		templateUrl: 'partials/polomyx.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('polomyx');
		}
	}).
		when('/airless', {
		templateUrl: 'partials/polomyx-airless.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('airless');
		}
	}).
		when('/flex', {
		templateUrl: 'partials/flex.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('flex');
		}
	}).
		when('/lightvision', {
		templateUrl: 'partials/light-vision.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('lightvision');
		}
	}).
		otherwise({
		redirectTo: '/counterpointe'
	});
}])

// Filter to find pagination start point
.filter('startFrom', function() {
    return function(input, start) {
    	if (!input || !input.length) { return; }
        start = +start; //parse to int
        return input.slice(start);
    }
});