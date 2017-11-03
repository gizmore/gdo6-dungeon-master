<?php
namespace GDO\DungeonMaster;
use GDO\Websocket\Server\GWS_Commands;
use GDO\Core\Logger;

final class DMWS extends GWS_Commands
{
	public function timer()
	{
		Logger::logDebug('timer');
	}
}
