'use strict';
angular.module('gdo6').
controller('DMMainCtrl', function($rootScope, $scope, GDOWebsocketSrvc) {
	
	$scope.init = function() {
		GDOWebsocketSrvc.withConnection().then($scope.connected);
	};

	$scope.connected = function() {
		console.log('DMMainCtrl.connected()');
		$scope.sendJoin();
	};

	$scope.sendJoin = function() {
		console.log('DMMainCtrl.sendJoin()');
		var gwsMessage = new GWS_Message().cmd(0x6203).sync();
		GDOWebsocketSrvc.sendBinary(gwsMessage).then($scope.joined, $scope.createChar);
	};
	
	$scope.joined = function() {
		console.log('DMMainCtrl.joined()');
	};

	$scope.createChar = function(err) {
		console.log('DMMainCtrl.createChar()', err);
		err = JSON.parse(err.key);
		if (err.error === 'err_create_player') {
			DMCreateCharDlg.open();
		}
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
	
	$scope.init();
});
