"use strict";
window.DM.Player = function(pid) {
	
	window.DM.Player.SERVICE.updatePlayer(this);
	
	this.USER = null;
	this.HAND = null;
	this.INVENTORY = [];
	this.EQUIPMENT = {
			ARMOR: null,
			WEAPON: null,
	};

	this.user = function(user) { this.USER = user; return this; };
	
};
