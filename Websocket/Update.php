<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Message;
use GDO\Websocket\Server\GWS_Server;
use GDO\Websocket\Server\GWS_Commands;
use GDO\Core\WithInstance;
use GDO\DungeonMaster\Core\DM_Global;
use GDO\Core\GDO;
use GDO\Core\GDOError;
use GDO\Core\GDOException;
use GDO\Websocket\Server\GWS_Global;

final class Update extends GWS_Command
{
	use WithInstance;

	private $payloads;
	
	public function tick()
	{
		$this->payloads = [];

		foreach (DM_Global::$PLAYERS as $player)
		{
			$player->tick();
		}
		foreach (DM_Global::$ITEMS as $item)
		{
			$item->tick();
		}
		
		foreach (DM_Global::$PLAYERS as $player)
		{
			if ($player->isDirty())
			{
				$player->save();
				$this->payloads[$player->getZ()] .= $this->gdoToBinary($player);
			}
		}
		
		foreach (DM_Global::$ITEMS as $item)
		{
			if ($item->isDirty())
			{
				$item->save();
				$this->payloads[$item->getZ()] .= $this->gdoToBinary($item);
			}
		}
		
		
		$this->sendPayloads();
	}
	
	public function execute(GWS_Message $msg)
	{
	}

	public function sendPayloads()
	{
		foreach ($this->payloads as $z => $payload)
		{
			GWS_Global::broadcast($payload);
		}
	}
}

GWS_Commands::register(0x6230, Update::instance());
