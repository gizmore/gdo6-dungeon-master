"use strict";
window.DM.Floor = function(z) {
	
	this.Z = z;
	this.TILES = new Array(64);
	for (var i = 0; i < 64; i++) { this.TILES[i] = new Array(64); }
	for (var y = 0; y < 64; y++) {
		for (var x = 0; x < 64; x++) {
			this.TILES[y][x] = new window.DM.Tile(x, y, window.DM.Tile.FOG);
		}
	}
	
	window.DM.Map.SERVICE.updateFloor(this);

	/////////////////
	this.setTile = function(x, y, type) {
		this.TILES[y][x].TYPE = type;
	};
	
	this.addItemId = function(x, y, itemId) {
		var item = window.DM.getItem(itemId);
		this.TILES[y][x].addItem(item);
		return item;
	};
};
