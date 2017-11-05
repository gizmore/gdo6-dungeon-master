'use strict';
angular.module('gdo6').
service('DMMapSrvc', function($rootScope, GDOWebsocketSrvc) {
	
	var DMMapSrvc = this;
	
	DMMapSrvc.updateFloor = function(floor) {
		console.log('DMMapSrvc.updateFloor()', floor);
		var gwsMessage = new GWS_Message().cmd(0x6210).sync().write8(0).write8(0).write32(floor.Z);
		gwsMessage.write8(64).write8(64);
		GDOWebsocketSrvc.sendBinary(gwsMessage).then(DMMapSrvc.cmd6210);
	};

	
	DMMapSrvc.cmd6210 = function(gwsMessage) {
		console.log('DMMapSrvc.cmd6210()', gwsMessage);
		var x = gwsMessage.read8();
		var y = gwsMessage.read8();
		var z = gwsMessage.read32();
		var w = gwsMessage.read8();
		var h = gwsMessage.read8();
		console.log('Received ', x, y, z, w, h);
		var floor = window.DM.MAP.getFloor(z);
		while (gwsMessage.hasMore()) {
			
			DMMapSrvc.parseTile(floor, gwsMessage);
		}
	};
	
	DMMapSrvc.parseTile = function(floor, gwsMessage) {
		console.log('DMMapSrvc.parseTile()', floor, gwsMessage);
		var x = gwsMessage.read8();
		var y = gwsMessage.read8();
		var type = gwsMessage.read8();
		var itemcount = gwsMessage.read8();
		floor.setTile(x, y, type);
		for (var i = 0; i < itemcount; i++) {
			var itemId = gwsMessage.read32();
			floor.addItemId(x, y, itemId);
		}
			
	};
	
	
});
