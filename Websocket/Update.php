<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Message;
use GDO\Websocket\Server\GWS_Server;
use GDO\Websocket\Server\GWS_Commands;
use GDO\Core\WithInstance;

final class Update extends GWS_Command
{
	use WithInstance;

	private $payloads;
	
	public function tick()
	{
		
	}
	public function execute(GWS_Message $msg)
	{
	}

}

GWS_Commands::register(0x6230, Update::instance());
