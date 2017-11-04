<?php
namespace GDO\DungeonMaster;
use GDO\Websocket\Server\GWS_Commands;
use GDO\DungeonMaster\Map\Loader;
use GDO\Core\Logger;

final class DMWS extends GWS_Commands
{
	############
	### Init ###
	############
	public function init()
	{
		Logger::logDebug("test");
		Loader::load();
	}

	#############
	### Timer ###
	#############
	public function timer()
	{
	}
}
