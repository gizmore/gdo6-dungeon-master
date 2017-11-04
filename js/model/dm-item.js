"use strict";
window.DM.Item = function(id) {
	this.ID = id;
	window.DM.Item.SERVICE.updateItem(this);
};
