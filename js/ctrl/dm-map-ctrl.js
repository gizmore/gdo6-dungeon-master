'use strict';
angular.module('gdo6').
controller('DMMapCtrl', function($rootScope, $scope, GDOWebsocketSrvc, DMMapSrvc) {
	
	$scope.init = function() {
		console.log('DMMapCtrl.init()', $scope.config);
	};
	
	
});
