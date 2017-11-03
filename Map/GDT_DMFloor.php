<?php
namespace GDO\DungeonMaster\Map;

use GDO\Core\GDT;

final class GDT_DMFloor extends GDT
{
	public function __construct()
	{
		
	}
	
	/**
	 * @return DM_Floor
	 */
	public function getFloor()
	{
		return $$this->gdo;
	}
	
	public function renderJSON()
	{
		$tile = $this->getTile();
		return array($tile->gkey() => array(
			'type' => $tile->getTileType(),
		));
	}
}
