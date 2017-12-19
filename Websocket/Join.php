<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_CommandForm;
use GDO\Websocket\Server\GWS_Commands;

final class Join extends GWS_CommandForm
{
	public function getMethod()
	{
		return \GDO\DungeonMaster\Method\Join::make();
	}
}

GWS_Commands::register(0x6203, new Join());
