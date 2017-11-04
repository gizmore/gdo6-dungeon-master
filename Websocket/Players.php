<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Message;
use GDO\Websocket\Server\GWS_Commands;
use GDO\DungeonMaster\Core\DM_Player;

final class Players extends GWS_Command
{
	public function execute(GWS_Message $msg)
	{
		$payload = '';
		while ($msg->hasMore())
		{
			if ($player = DM_Player::getById($msg->read32u()))
			{
				$payload .= $this->playerPayload($player);
			}
		}
		return $msg->replyBinary($msg->cmd(), $payload);
	}
	
	private function playerPayload(DM_Player $player)
	{
		$payload = $this->gdoToBinary($player);
	}
	
}

GWS_Commands::register(0x6212, new Players());