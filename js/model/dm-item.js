"use strict";
window.DM.Item = function(id) {
	console.log("new DM.Item()", id);
	this.ID = id;
	window.DM.Item.SERVICE.updateItem(this);
};
