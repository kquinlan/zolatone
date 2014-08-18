angular.module('zipCodes', [])

.controller('zipCodesCtrl', function($scope, $http) {

	$http({method: 'GET', url: '/js/zip-codes/distributors.json'}).
    success(function(data, status, headers, config) {

		$scope.distributors = data;

    })

});