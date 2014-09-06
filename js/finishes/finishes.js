angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $http) {

	$http({method: 'GET', url: '/js/finishes/counterpointe.json'}).
    success(function(data, status, headers, config) {

		$scope.colors = data;

    })

    $scope.currentPage = 0;
    $scope.pageSize = 24;
    $scope.numberOfPages=function(){
        return Math.ceil($scope.colors.length/$scope.pageSize);                
    }
	
	$scope.nextPage = function() {
		$scope.currentPage = $scope.currentPage + 1;
	}
	$scope.prevPage = function() {
		$scope.currentPage = $scope.currentPage - 1;
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
	}).
		when('/lluminations', {
		templateUrl: 'partials/lluminations.tpl.html',
	}).
		when('/metal', {
		templateUrl: 'partials/metal.tpl.html',
	}).
		when('/polomyx', {
		templateUrl: 'partials/polomyx.tpl.html',
	}).
		when('/polomyx-airless', {
		templateUrl: 'partials/polomyx-airless.tpl.html',
	}).
		when('/flex', {
		templateUrl: 'partials/flex.tpl.html',
	}).
		when('/light-vision', {
		templateUrl: 'partials/light-vision.tpl.html',
	}).
		otherwise({
		redirectTo: '/counterpointe'
	});
}]);