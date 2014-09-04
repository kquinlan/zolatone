angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $http) {

	$http({method: 'GET', url: '/js/finishes/counterpointe.json'}).
    success(function(data, status, headers, config) {

		$scope.colors = data;

    })

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