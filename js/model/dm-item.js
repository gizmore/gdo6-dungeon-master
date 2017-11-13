"use strict";
window.DM.Item = function(id) {
	console.log("new DM.Item()", id);
	this.TILE = null;
	this.ID = id;
	this.PLAYERID = 0;
	this.SLOT = 0;
	this.CLASS = 0;
	this.COUNT = 0;
	this.X = 0;
	this.Y = 0;
	this.Z = 0;
	this.HP = 0;
	this.STRENGTH = 0;
	window.DM.Item.SERVICE.updateItem(this);

	this.image = function() {
		return 'GDO/DungeonMaster/img/item/'+this.CLASS+'.png';
	};
	
};
