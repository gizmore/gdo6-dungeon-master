'use strict';
angular.module('gdo6').
controller('DMMainCtrl', function($rootScope, $scope, GDOWebsocketSrvc) {
	
	$scope.init = function() {
		GDOWebsocketSrvc.withConnection().then($scope.connected);
	};

	$scope.connected = function() {
	};
	
	$rootScope.$on('gws-ws-message', function(event, gwsMessage) {
		console.log(gwsMessage);
		var cmd = gwsMessage.readCmd();
		var method = sprintf('on_%04x', cmd);
		$scope[method](gwsMessage);
		$scope.$apply();
	});
	
	$scope.on_6220 = function(gwsMessage) {
		console.log('DMMainCtrl.on_6220(DrawTile)', gwsMessage);
		var x = gwsMessage.read8();
		var y = gwsMessage.read8();
		var z = gwsMessage.read32();
		var floor = window.DM.getFloor(z);
		var tile = floor.getTile(x, y);
		tile.TYPE = gwsMessage.read8();
	};
	
});
