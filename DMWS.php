<?php
namespace GDO\DungeonMaster;

use GDO\Websocket\Server\GWS_Commands;
use GDO\DungeonMaster\Map\Loader;
use GDO\DungeonMaster\Websocket\Update;

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
}
