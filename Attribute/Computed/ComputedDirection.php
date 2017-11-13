<?php
namespace GDO\DungeonMaster\Attribute\Computed;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_Enum;

class ComputedDirection extends GDT_Enum
{
	use DM_Attribute;
	public function isComputed() { return true; }
	
	const FLOOR = 'floor';
	const NORTH = 'north';
	const EAST = 'east';
	const SOUTH = 'south';
	const WEST = 'west';
	
	public function __construct()
	{
		$this->enumValues(self::NORTH, self::EAST, self::WEST, self::SOUTH);
	}
	
	public function apply(DM_Player $player)
	{
	}
	
}
