<?php
namespace GDO\DungeonMaster\Map;

use GDO\DB\GDT_Enum;

final class GDT_DMTile extends GDT_Enum
{
	public function __construct()
	{
		
	}
	
	/**
	 * @return DM_Tile
	 */
	public function getTile()
	{
		return $this->gdo;
	}
	
	public function renderJSON()
	{
		$tile = $this->getTile();
		return array($tile->getID() => array(
			'type' => $tile->getTileType(),
		));
	}
}
