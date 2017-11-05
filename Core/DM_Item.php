<?php
namespace GDO\DungeonMaster\Core;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DungeonMaster\Core\GDT\GDT_DMSlot;
use GDO\DungeonMaster\Util\DM_Loader;
use GDO\DB\GDT_String;
use GDO\DungeonMaster\Core\GDT\GDT_DMPlayer;
use GDO\DB\GDT_UInt;
use GDO\DungeonMaster\Map\Map;
use GDO\DungeonMaster\Item\Item;

class DM_Item extends GDO
{
	public function gdoColumns()
	{
		$fields = array(
			GDT_AutoInc::make('item_id'),
			GDT_DMPlayer::make('item_player'),
			GDT_DMSlot::make('item_slot'),
			GDT_String::make('item_class')->max(32)->notNull(),
			GDT_UInt::make('item_count')->bytes(2)->initial('1')->notNull(),
			GDT_UInt::make('item_x')->bytes(1),
			GDT_UInt::make('item_y')->bytes(1),
			GDT_UInt::make('item_z')->bytes(4),
		);
		$fields = array_merge($fields, DM_Loader::instance()->loadPersistentAttributes());
		unset($fields['Race']);
		unset($fields['Gender']);
		return $fields;
	}
	##############
	### Getter ###
	##############
	public function getX() { return $this->getVar('item_x'); }
	public function getY() { return $this->getVar('item_y'); }
	public function getZ() { return $this->getVar('item_z'); }
	
	############
	### Tile ###
	############
	public function getTile() { return Map::instance()->getTile($this->getX(), $this->getY(), $this->getZ()); }
	
	##################
	### Item class ###
	##################
	/**
	 * @var Item
	 */
	private $item;
	public function getItemClass() { return $this->getVar('item_class'); }
	public function item()
	{
		if (!$this->item)
		{
			$this->item = new $this->getItemClass();
			foreach (DM_Loader::instance()->loadPersistentAttributes() as $attr => $gdoType)
			{
				
			}
		}
		return $this->item;
	}
	##############
	### Render ###
	##############
	public function renderJSON()
	{
		return array($this->getID() => $this->getGDOVars());
	}
}
