"use strict";
window.DM.Player = function(pid) {
	
	this.PID = pid;
	this.NPC = null;
	this.USERID = null;
	this.TILE = null;
	this.HAND = null;
	this.INVENTORY = [];
	this.EQUIPMENT = {
		ARMOR: null,
		WEAPON: null,
	};

	this.user = function(user) { this.USER = user; return this; };
	this.image = function() {
		
		return this.NPC ?
			('<img ng-src="GDO/DungeonMaster/img/npc/'+this.NPC+'.png" />') :
			(window.GWF_WEB_ROOT + 'index.php?mo=Avatar&me=ImageUser&id='+this.USERID);
	};

	window.DM.Player.SERVICE.updatePlayer(this);
};
