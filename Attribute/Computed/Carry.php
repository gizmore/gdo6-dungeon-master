<?php
namespace GDO\DungeonMaster\Attribute\Computed;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_UInt;

class Carry extends GDT_UInt
{
	use DM_Attribute;
	public function isComputed() { return true; }
	
	public function apply(DM_Player $player)
	{
		foreach ($player->inventory() as $item)
		{
			$player->adjust('Carry', $item->adjusted('Weight'));
		}
		foreach ($player->equipment() as $item)
		{
			$player->adjust('Carry', $item->adjusted('Weight'));
		}
	}
	
}
