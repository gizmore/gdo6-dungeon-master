'use strict';
angular.module('gdo6').
controller('DMMapEditCtrl', function($rootScope, $scope, GDOWebsocketSrvc) {
	
	$scope.initJSON = function(config) {
		console.log('DMMapEditCtrl.initJSON()', config);
		$scope.config = config;
		
		$scope.init();
	};
	
	$scope.init = function() {
		console.log('DMMapEditCtrl.init()', $scope.config);
		GDOWebsocketSrvc.withConnection().then($scope.connected);
	};
	
	$scope.connected = function() {
		var gwsMessage = new GWS_Message().cmd(0x6210).sync().write8(0).write8(0).write32($scope.config.floor);
		gwsMessage.write8(255).write8(255);
		GDOWebsocketSrvc.sendBinary(gwsMessage).then($scope.withMap);
	};
	
	$scope.withMap = function(message) {
		console.log('DMMapEditCtrl.withMap()', message);

	};
	
});
