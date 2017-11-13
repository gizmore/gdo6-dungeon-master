<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_Enum;

class Direction extends GDT_Enum
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function __construct()
	{
		$this->enumValues(self::NORTH, self::EAST, self::WEST, self::SOUTH);
	}
	
	const FLOOR = 'floor';
	const NORTH = 'north';
	const EAST = 'east';
	const SOUTH = 'south';
	const WEST = 'west';
	
	public $noFloor = false;
	public function noFloor($noFloor=true)
	{
		$this->noFloor = $noFloor;
		return $this;
// 		return $this->enumValues(...(
// 			$noFloor ? [self::NORTH, self::EAST, self::SOUTH, self::WEST] :
// 			[self::FLOOR, self::NORTH, self::EAST, self::SOUTH, self::WEST]));
	}
	
	public function validate($value)
	{
		if (parent::validate($value))
		{
			if ( ($this->noFloor) && ($value === self::FLOOR) )
			{
				return $this->error('err_invalid_choice');
			}
			return true;
		}
	}
	
	public function apply(DM_Player $player)
	{
	}
	
}
