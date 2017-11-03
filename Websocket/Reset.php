<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_CommandMethod;
use GDO\Websocket\Server\GWS_Message;

final class Reset extends GWS_CommandMethod
{
	public function getMethod()
	{
		return \GDO\DungeonMaster\Method\Reset::make();
	}
	
}
