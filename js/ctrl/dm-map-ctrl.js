'use strict';
angular.module('gdo6').
controller('DMMapCtrl', function($rootScope, $scope, GDOWebsocketSrvc, DMMapSrvc) {
	
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
		
//		$scope.floor = window.DM.setFloor($scope.config.floor);
//		var gwsMessage = new GWS_Message().cmd(0x6210).sync().write8(0).write8(0).write32($scope.config.floor);
//		gwsMessage.write8(64).write8(64);
//		GDOWebsocketSrvc.sendBinary(gwsMessage).then(DMMapSrvc.cmd6210);
	};

});
