<?php
namespace GDO\DungeonMaster\Attribute\Computed;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_UInt;

class MaxCarry extends GDT_UInt
{
	use DM_Attribute;
	public function isComputed() { return true; }
	
	public function apply(DM_Player $player)
	{
		$overload = $player->adjusted('Carry') > $player->adjusted('MaxCarry');
		$player->overloaded($overload);
	}
	
}
