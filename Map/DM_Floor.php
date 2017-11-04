<?php
namespace GDO\DungeonMaster\Map;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\UI\GDT_Title;
use GDO\DB\GDT_DeletedAt;
use GDO\DB\GDT_DeletedBy;
use GDO\DB\GDT_Name;

final class DM_Floor extends GDO
{
	public static function getOrCreateByName($name)
	{
		if (!($floor = self::getBy('floor_name', $name)))
		{
			$floor = self::blank(array('floor_name'=>$name))->insert();
		}
		return $floor;
	}
	###########
	### GDO ###
	###########
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('floor_id'),
			GDT_Name::make('floor_name'),
			GDT_Title::make('floor_title'),
			GDT_DeletedAt::make('floor_deleted'),
			GDT_DeletedBy::make('floor_deletor'),
		);
	}
	public function getZ() { return $this->getVar('floor_id'); }
	public function getName() { return $this->getVar('floor_name'); }
	public function renderChoice() { return $this->getID() . '-' . $this->getName(); }

	#############
	### Tiles ###
	#############
	/**
	 * @var DM_Tile[]
	 */
	private $tiles = [];
	public function gkeyFor($x, $y) { return "{$this->getZ()}:$y:$x"; }
	public function addTile(DM_Tile $tile) { $this->tiles[$tile->getID()] = $tile; }
	public function tiles() { return $this->tiles; }
	
	/**
	 * @param int $x
	 * @param int $y
	 * @return DM_Tile
	 */
	public function getTile($x, $y)
	{
		return @$this->tiles[$this->gkeyFor($x, $y)];
	}
	
}
