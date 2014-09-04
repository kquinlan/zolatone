angular.module('finishes', ['ngRoute'])

.controller('finishesCtrl', function($scope, $http) {

	$scope.colors = [
		{
			'name': 'PFX-01053',
			'color': 'white',
			'tone': '',
			'effect': 'neutral',
			'new': false
		},
		{
			'name': 'PFX-01064',
			'color': 'gray',
			'tone': 'cool',
			'effect': 'neutral',
			'new': false
		},
		{
			'name': 'PFX-C3001',
			'color': 'brown',
			'tone': 'warm',
			'effect': 'neutral accent',
			'new': false
		},
		{
			'name': 'PFX-01036',
			'color': 'green',
			'tone': 'cool',
			'effect': 'accent',
			'new': false
		},
		{
			'name': 'PFX-C3064',
			'color': 'orange red',
			'tone': 'warm',
			'effect': 'accent',
			'new': false
		},
		{
			'name': 'PFX-01027',
			'color': 'red',
			'tone': 'warm',
			'effect': 'accent',
			'new': false
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