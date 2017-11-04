"use strict";
window.DM.Tile = function(x, y, type) {
	
	this.X = x; this.Y = y; this.TYPE = type;
	this.ITEMS = null;
	
	this.addItem = function(item) {
		this.ITEMS = this.ITEMS || [];
		this.ITEMS.push(item);
	};

};

window.DM.Tile.FOG = 0;
window.DM.Tile.END = 255;
