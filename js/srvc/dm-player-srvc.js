'use strict';
angular.module('gdo6').
service('DMPlayerSrvc', function($rootScope, GDOWebsocketSrvc) {
	
	var DMPlayerSrvc = this;
	
	DMPlayerSrvc.updatePlayer = function(playerId) {
		
	};
	
	DMPlayerSrvc.cmd6212 = function(gwsMessage) {
		console.log('DMPlayerSrvc.cmd6212()', gwsMessage);
		while (gwsMessage.hasMore()) {
			DMPlayerSrvc.parsePlayer(gwsMessage);
		}
	};
	
	DMPlayerSrvc.parsePlayer = function(gwsMessage) {
		console.log('DMPlayerSrvc.parseTile()', gwsMessage);
		
		window.DM.Player.addPlayer();
	};
	
	
});
