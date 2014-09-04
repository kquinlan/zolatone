angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $http) {

	$scope.colors = [
		{
			'name': 'PFX 01053',
			'tags': [
						'white', 
						'neutral'
					]
		},
		{
			'name': 'PFX 01064',
			'tags': [
						'gray', 
						'neutral',
						'cool'
					]
		},
		{
			'name': 'PFX C3001',
			'tags': [
						'warm', 
						'neutral',
						'accent'
					]
		},
		{
			'name': 'PFX 01036',
			'tags': [
						'green', 
						'cool',
						'accent'
					]
		}
	]

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