'use strict';
angular.module('gdo6').
controller('DMMainCtrl', function($rootScope, $scope, GDOWebsocketSrvc) {
	
	$scope.init = function() {
		GDOWebsocketSrvc.withConnection().then($scope.connected);
	};

	$scope.connected = function() {
	};
	
});
