<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_CommandForm;
use GDO\Websocket\Server\GWS_Commands;

final class Reset extends GWS_CommandForm
{
	public function getMethod()
	{
		return \GDO\DungeonMaster\Method\Reset::make();
	}
}

GWS_Commands::register(0x6202, new Reset());
