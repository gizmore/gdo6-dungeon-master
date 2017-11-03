<?php
namespace GDO\DungeonMaster\Core;
use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DungeonMaster\Core\GDT\GDT_DMSlot;
use GDO\DungeonMaster\Util\DM_Loader;
use GDO\User\GDT_User;
use GDO\DB\GDT_String;
use GDO\DungeonMaster\Core\GDT\GDT_DMPlayer;

class DM_Item extends GDO
{
	public function gdoColumns()
	{
		$fields = array(
			GDT_AutoInc::make('item_id'),
			GDT_DMPlayer::make('item_user'),
			GDT_DMSlot::make('item_slot'),
			GDT_String::make('item_class')->max(32)->notNull(),
		);
		$fields = array_merge($fields, DM_Loader::instance()->loadPersistentAttributes());
		unset($fields['Race']);
		unset($fields['Gender']);
		return $fields;
	}
	
	public function getItemClass() { return $this->getVar('item_class'); }
	
	private $item;
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
}
