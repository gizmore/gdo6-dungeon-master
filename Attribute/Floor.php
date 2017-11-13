<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_UInt;

class Floor extends GDT_UInt
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function __construct()
	{
		$this->initial('0');
		$this->bytes(4);
	}
	
	public function apply(DM_Player $player)
	{
	}
	
}
