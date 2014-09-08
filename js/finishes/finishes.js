angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $rootScope, $http) {

	$http({method: 'GET', url: '/js/finishes/colors.json'}).
    success(function(data, status, headers, config) {
		$scope.colors = data;
    })

    $scope.currentPage = 0;
    $scope.pageSize = 12;

    $scope.numberOfPages = function(){
        return Math.ceil($scope.colors.length/$scope.pageSize);                
    }
	$scope.nextPage = function() {
		$scope.currentPage = $scope.currentPage + 1;
	}
	$scope.prevPage = function() {
		$scope.currentPage = $scope.currentPage - 1;
	}
	$scope.toStart = function() {
		$scope.currentPage = 0;
	}

	$scope.select = function(color) {
		$scope.selectedColor = color;
	}
})

.config(['$routeProvider', function($routeProvider) {
	$routeProvider.
		when('/counterpointe', {
		templateUrl: 'partials/counterpointe.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'counterpointe';
		}
	}).
		when('/lluminations', {
		templateUrl: 'partials/lluminations.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'lluminations';
		}
	}).
		when('/metal', {
		templateUrl: 'partials/metal.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'metal';
		}
	}).
		when('/polomyx', {
		templateUrl: 'partials/polomyx.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'polomyx';
		}
	}).
		when('/polomyx-airless', {
		templateUrl: 'partials/polomyx-airless.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'polomyx-airless';
		}
	}).
		when('/flex', {
		templateUrl: 'partials/flex.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'flex';
		}
	}).
		when('/light-vision', {
		templateUrl: 'partials/light-vision.tpl.html',
		controller: function($scope) {
			$scope.search.finish = 'light-vision';
		}
	}).
		otherwise({
		redirectTo: '/counterpointe'
	});
}])

.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});