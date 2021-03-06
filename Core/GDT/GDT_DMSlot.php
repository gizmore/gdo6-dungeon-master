<?php
namespace GDO\DungeonMaster\Core\GDT;

use GDO\DB\GDT_Enum;

final class GDT_DMSlot extends GDT_Enum
{
	const AMULET = 'amulet';
	const ARMOR = 'armor';
	const BELT = 'belt';
	const BOOTS = 'boots';
	const HELMET = 'helmet';
	const INVENTORY = 'inventory';
	const LEGS = 'legs';
	const MOUNT = 'mount';
	const PIERCING = 'piercing';
	const RING = 'ring';
	const WEAPON = 'weapon';
	
	public static $ALL = [self::AMULET, self::ARMOR, self::BELT, self::BOOTS, self::HELMET,
		self::INVENTORY, self::LEGS, self::MOUNT, self::PIERCING, self::RING, self::WEAPON];
	
	public function __construct()
	{
		$this->enumValues(...self::$ALL);
	}
}