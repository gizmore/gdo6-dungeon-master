<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_UInt;

class Strength extends GDT_UInt
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function __construct()
	{
		$this->initial('0');
		$this->bytes(1);
	}
	
	public function apply(DM_Player $player)
	{
		$player->adjust('MaxCarry', $this->getVar()*1000);
		$player->adjust('MaxHP', $this->getVar()*2);
	}

	
}
