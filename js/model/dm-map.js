"use strict";
window.DM.Map = function() {

	this.FLOORS = {};
	
	this.CURRENT = 0;
	
	this.getFloor = function(z) {
		this.FLOORS[z] = this.FLOORS[z] || new window.DM.Floor(z);
		return this.FLOORS[z];
	};
};

window.DM.MAP = new window.DM.Map();
