angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $rootScope, $http) {

	// Get all colors file
	$http({method: 'GET', url: '/js/finishes/colors.json'}).
    success(function(data, status, headers, config) {
		$scope.colors = data;
    })

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
		$scope.$watch('colorFilter.$valid', function(validity) { 
			$scope.search.finish = validity ? '' : finish;
			$scope.search.color = '';
			$scope.search.tone = '';
			$scope.search.effect = '';
		});
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
		when('/polomyx-airless', {
		templateUrl: 'partials/polomyx-airless.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('polomyx-airless');
		}
	}).
		when('/flex', {
		templateUrl: 'partials/flex.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('flex');
		}
	}).
		when('/light-vision', {
		templateUrl: 'partials/light-vision.tpl.html',
		controller: function($scope) {
			$scope.toggleAll('light-vision');
		}
	}).
		otherwise({
		redirectTo: '/counterpointe'
	});
}])

// Filter to find pagination start point
.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});