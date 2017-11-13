"use strict";
window.DM.Tile = function(x, y, type) {
	
	this.X = x; this.Y = y;
	this.TYPE = type;

	this.ITEMS = null;
	this.PLAYERS = null;
	
	this.z = function() { return window.DM.MAP.CURRENT; };
	
	this.image = function() {
		return 'GDO/DungeonMaster/img/tile/'+this.TYPE+'.png';
	};
	
	this.addItem = function(item) {
		this.ITEMS = this.ITEMS || [];
		item.TILE = this;
		this.ITEMS.push(item);
	};
	this.removeItem = function(item) {
		var index = this.ITEMS.indexOf(item);
		if (index > -1) {
			this.ITEMS.splice(index, 1);
		}
	};
	this.getItems = function() {
		return this.ITEMS;
	};

	this.addPlayer = function(player) {
		this.PLAYERS = this.PLAYERS || [];
		player.TILE = this;
		this.PLAYERS.push(player);
	};
	this.removePlayer = function(player) {
		var index = this.PLAYERS.indexOf(player);
		if (index > -1) {
			this.PLAYERS.splice(index, 1);
		}
	};
	this.getPlayers = function() {
		return this.PLAYERS;
	};

};

window.DM.Tile.FOG = 0;
window.DM.Tile.END = 255;
