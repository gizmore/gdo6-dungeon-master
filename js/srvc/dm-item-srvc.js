'use strict';
angular.module('gdo6').
service('DMItemSrvc', function($rootScope, GDOWebsocketSrvc) {
	
	var DMItemSrvc = this;
	
	DMItemSrvc.updateItem = function(item) {
		console.log('DMItemSrvc.updateItem()', item);
		var gwsMessage = new GWS_Message().cmd(0x6211).sync().write32(item.ID);
		GDOWebsocketSrvc.sendBinary(gwsMessage).then(DMItemSrvc.cmd6211);
	};
	
	DMItemSrvc.cmd6211 = function(gwsMessage) {
		console.log('DMItemSrvc.cmd6211()', gwsMessage);
		while (gwsMessage.hasMore()) {
			DMItemSrvc.parseItem(gwsMessage);
		}
	};
	
	DMItemSrvc.parseItem = function(gwsMessage) {
		var id = gwsMessage.read32();
		var item = window.DM.getItem(id);
		item.PLAYERID = gwsMessage.read32();
		item.SLOT = gwsMessage.read32();
		item.CLASS = gwsMessage.readString();
		item.COUNT = gwsMessage.read32();
		item.X = gwsMessage.read8();
		item.Y = gwsMessage.read8();
		item.Z = gwsMessage.read32();
		
		item.HP = gwsMessage.read16();
		item.STRENGTH = gwsMessage.read8();
	};
	
	
});
