<?php
namespace GDO\DungeonMaster\Map;

use GDO\Core\GDO;
use GDO\DB\GDT_UInt;
use GDO\DB\GDT_Object;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_CreatedBy;
use GDO\DungeonMaster\Core\DM_Item;

final class DM_Tile extends GDO
{
	# planet
	const DUST = 1;
	const GRASS = 2;
	# city
	const HOUSE = 20;
	const CITY_DOOR = 21;
	
	# underground
	const DUNGEON = 50;
	const DOWN = 97;
	const UP = 98;
	const TRAP = 99;
	
	# Cannot pass
	const WATER = 100;
	const OCEAN = 101;
	const FORCEFIELD = 102;
	
	# Cannot look nor pass
	const WALL = 200;
	const TREES = 201;
	const CITY_WALL = 220;
	const HOUSE_WALL = 221;
	const DUNGEON_WALL = 240;
	const END = 255;
	
	###############
	### Factory ###
	###############
	public static function endOfMap()
	{
		return self::blank(['tile_type'=>self::END]);
	}
	
	public static function getTile($x,$y,$z)
	{
		return self::getById($z,$y,$x);
	}

	public static function getOrBlank($x,$y,$z)
	{
		if (!($tile = self::getTile($x, $y, $z)))
		{
			$tile = self::blank(array(
				'tile_z' => $z,
				'tile_y' => $y,
				'tile_x' => $x,
			));
		}
		return $tile;
	}
	###########
	### GDO ###
	###########
	public function gdoColumns()
	{
		return array(
			GDT_Object::make('tile_z')->table(DM_Floor::table())->primary(),
			GDT_UInt::make('tile_y')->bytes(1)->primary(),
			GDT_UInt::make('tile_x')->bytes(1)->primary(),
			GDT_UInt::make('tile_type')->bytes(1)->notNull(),
			GDT_CreatedAt::make('tile_created'),
			GDT_CreatedBy::make('tile_creator'),
		);
	}
	
	##############
	### Getter ###
	##############
	/**
	 * @return \GDO\DungeonMaster\Map\DM_Floor
	 */
	public function getFloor() { return $this->getValue('tile_z'); }
	public function getFloorID() { return $this->getZ(); }
	public function getX() { return $this->getVar('tile_x'); }
	public function getY() { return $this->getVar('tile_y'); }
	public function getZ() { return $this->getVar('tile_z'); }
	public function getTileType() { return $this->getVar('tile_type'); }
	
	##############
	### Render ###
	##############
	public function renderJSON()
	{
		return array($this->getID() => array(
			'type' => $this->getTileType(),
		));
	}
	
	############
	### Tile ###
	############
	public function canTrespass() { return $this->getTileType() < 100; }
	public function canOverview() { return $this->getTileType() < 200; }

	#############
	### Items ###
	#############
	private $items;
	public function items()
	{
		if (!$this->items)
		{
			$this->items = [];
		}
		return $this->items;
	}
	
	public function addItem(DM_Item $item)
	{
		$this->items()[$item->getID()] = $item;
	}
}
