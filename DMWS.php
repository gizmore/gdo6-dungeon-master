<?php
namespace GDO\DungeonMaster;

use GDO\Websocket\Server\GWS_Commands;
use GDO\DungeonMaster\Map\Loader;
use GDO\DungeonMaster\Websocket\Update;
use GDO\User\GDO_User;
use GDO\DungeonMaster\Core\DM_Global;
use GDO\Dropleet\DL_Player;

final class DMWS extends GWS_Commands
{
	############
	### Init ###
	############
	public function init()
	{
		Loader::load();
	}

	#############
	### Timer ###
	#############
	public function timer()
	{
		Update::instance()->tick();
	}
	
	#############
	### Event ###
	#############
	public function connect(GDO_User $user)
	{
		
	}
	public function disconnect(GDO_User $user) {}
	
}
