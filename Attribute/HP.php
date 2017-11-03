<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_UInt;

class HP extends GDT_UInt
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function __construct()
	{
		$this->initial('0');
	}
	
	public function apply(DM_Player $player)
	{
		$dead = $player->adjusted('HP') <= 0;
		$player->dead($dead);
	}
	
}
