<?php
namespace GDO\DungeonMaster\Map;

use GDO\DungeonMaster\Core\DM_Item;

final class Loader
{
	public static function load()
	{
		self::loadTiles();
		self::loadItems();
	}
	
	public static function loadTiles()
	{
		$map = Map::instance();
		$map->clear();
		$tiles = DM_Tile::table();
		$result = $tiles->select()->exec();
		while ($tile = $tiles->fetch($result))
		{
			$floor = $tile->getFloor();
			$floor->addTile($tile);
			$map->addFloor($floor);
		}
	}
	
	public static function loadItems()
	{
		$items = DM_Item::table();
		$result = $items->select()->where("Floor IS NOT NULL")->exec();
		while ($item = $items->fetch($result))
		{
			$item->getTile()->addItem($item);
		}
	}
	
}