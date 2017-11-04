<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Commands;
use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Message;
use GDO\DungeonMaster\Map\DM_Floor;
use GDO\DungeonMaster\Map\DM_Tile;
use GDO\Core\Logger;

final class Map extends GWS_Command
{
	public function execute(GWS_Message $msg)
	{
		$x = $msg->read8(false);
		$y = $msg->read8(false);
		$z = $msg->read32(false);
		$floor = DM_Floor::findById($z);
		$w = $msg->read8(false);
		$h = $msg->read8(false);
		$payload = GWS_Message::wr8($x);
		$payload .= GWS_Message::wr8($y);
		$payload .= GWS_Message::wr32($z);
		$payload .= GWS_Message::wr8($w);
		$payload .= GWS_Message::wr8($h);
		for ($Y = 0; $Y < $h; $Y++)
		{
			for ($X = 0; $X < $w; $X++)
			{
				if ($tile = $floor->getTile($x+$X, $y+$Y))
				{
					$payload .= $this->payloadTile($tile);
				}
			}
		}
		
// 		$payload .= GWS_Message::wr8(0); # FIN
		
		return $msg->replyBinary($msg->cmd(), $payload);
	}
	
	private function payloadTile(DM_Tile $tile)
	{
		$payload =
			GWS_Message::wr8($tile->getX()).
			GWS_Message::wr8($tile->getY()).
			GWS_Message::wr8($tile->getTileType());
			$payload .= GWS_Message::wr8($tile->itemCount());
		if ($tile->itemCount())
		{
			foreach ($tile->items() as $item)
			{
				$payload .= GWS_Message::wr32($item->getID());
			}
		}
		return $payload;
	}

}

GWS_Commands::register(0x6210, new Map());
