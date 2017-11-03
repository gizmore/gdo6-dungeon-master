<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_CommandForm;
use GDO\Websocket\Server\GWS_Commands;

final class Map extends GWS_CommandForm
{
	public function getMethod()
	{
		return \GDO\DungeonMaster\Method\Map::make();
	}
}

GWS_Commands::register(0x6210, new Map());
