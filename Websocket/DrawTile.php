<?php
namespace GDO\DungeonMaster\Websocket;

use GDO\Websocket\Server\GWS_Command;
use GDO\Websocket\Server\GWS_Commands;
use GDO\Websocket\Server\GWS_Message;
use GDO\DungeonMaster\Map\DM_Tile;
use GDO\Websocket\Server\GWS_Global;

final class DrawTile extends GWS_Command
{
	public function execute(GWS_Message $msg)
	{
		$x = $msg->read8();
		$y = $msg->read8();
		$z = $msg->read32();
		$type = $msg->read8();

		# Change tile
		if ($tile = DM_Tile::getTile($x, $y, $z))
		{
			$tile->saveVar('tile_type', $type);
		}
		else
		{
			$tile = DM_Tile::blank(array(
				'tile_z' => $z,
				'tile_y' => $y,
				'tile_x' => $x,
				'tile_type' => $type,
			))->insert();
		}
		$payload = GWS_Message::payload($msg->cmd());
		$payload .= $msg->wr8($x) . $msg->wr8($y) . $msg->wr32($z);
		$payload .= $msg->wr8($type);
		GWS_Global::broadcastBinary($payload);
	}
	
}

GWS_Commands::register(0x6220, new DrawTile());