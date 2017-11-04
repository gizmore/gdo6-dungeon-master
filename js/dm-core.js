'use strict';
window.DM = {
	ITEMS: {},
	PLAYERS: {},
	MAP: null,
};

window.DM.getItem = function(itemId) {
	if (!window.DM.ITEMS[itemId]) {
		window.DM.ITEMS[itemId] = new window.DM.Item(itemId);
	}
	return window.DM.ITEMS[itemId];
};
window.DM.getPlayer = function(playerId) {
	if (!window.DM.PLAYERS[playerId]) {
		window.DM.PLAYERS[playerId] = new window.DM.Player(playerId);
	}
	return window.DM.PLAYERS[playerId];
};
window.DM.setFloor = function(floorId) {
	window.DM.MAP.CURRENT = floorId;
	return window.DM.getCurrentFloor();
};
window.DM.getCurrentFloor = function() {
	return window.DM.getFloor(window.DM.MAP.CURRENT);
};
window.DM.getFloor = function(floorId) {
	return window.DM.MAP.getFloor(floorId);
};

angular.module('gdo6').run(function(DMMapSrvc, DMItemSrvc, DMPlayerSrvc){
	window.DM.Map.SERVICE = DMMapSrvc;
	window.DM.Item.SERVICE = DMItemSrvc;
	window.DM.Player.SERVICE = DMPlayerSrvc;
	window.DM.PLAYER = new window.DM.Player().user(window.GDO_USER);
});
