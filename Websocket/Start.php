<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_CommandForm;
use GDO\Websocket\Server\GWS_Commands;

final class Start extends GWS_CommandForm
{
	public function getMethod()
	{
		return \GDO\DungeonMaster\Method\Start::make();
	}
}

GWS_Commands::register(0x6204, new Start());
