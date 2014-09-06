angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $rootScope, $http) {

	$http({method: 'GET', url: '/js/finishes/counterpointe.json'}).
    success(function(data, status, headers, config) {

		$scope.colors = data;

    })

    $scope.currentPage = 0;
    $scope.pageSize = 12;
    $scope.numberOfPages=function(){
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
})

.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
})

.config(['$routeProvider', function($routeProvider) {
	$routeProvider.
		when('/counterpointe', {
		templateUrl: 'partials/counterpointe.tpl.html',
		controller: function($scope) {
			$scope.finish = 'counterpointe';
			console.log($scope.finish);
		}
	}).
		when('/lluminations', {
		templateUrl: 'partials/lluminations.tpl.html',
		controller: function($scope) {
			$scope.finish = 'lluminations';
			console.log($scope.finish);
		}
	}).
		when('/metal', {
		templateUrl: 'partials/metal.tpl.html',
		controller: function($scope) {
			$scope.finish = 'metal';
			console.log($scope.finish);
		}
	}).
		when('/polomyx', {
		templateUrl: 'partials/polomyx.tpl.html',
		controller: function($scope) {
			$scope.finish = 'polomyx';
			console.log($scope.finish);
		}
	}).
		when('/polomyx-airless', {
		templateUrl: 'partials/polomyx-airless.tpl.html',
		controller: function($scope) {
			$scope.finish = 'polomyx-airless';
			console.log($scope.finish);
		}
	}).
		when('/flex', {
		templateUrl: 'partials/flex.tpl.html',
		controller: function($scope) {
			$scope.finish = 'flex';
			console.log($scope.finish);
		}
	}).
		when('/light-vision', {
		templateUrl: 'partials/light-vision.tpl.html',
		controller: function($scope) {
			$scope.finish = 'light-vision';
			console.log($scope.finish);
		}
	}).
		otherwise({
		redirectTo: '/counterpointe'
	});
}]);