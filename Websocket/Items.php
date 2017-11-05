<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Message;
use GDO\DungeonMaster\Core\DM_Item;
use GDO\Websocket\Server\GWS_Commands;
use GDO\DungeonMaster\Core\GDT\GDT_DMSlot;

final class Items extends GWS_Command
{
	public function execute(GWS_Message $msg)
	{
		$payload = '';
		while ($msg->hasMore())
		{
			if ($item = DM_Item::getById($msg->read32u()))
			{
				$payload .= $this->itemPayload($item);
			}
		}
		return $msg->replyBinary($msg->cmd(), $payload);
	}

	private function itemPayload(DM_Item $item)
	{
		return $this->gdoToBinary($item);
	}
	
}

GWS_Commands::register(0x6211, new Items());