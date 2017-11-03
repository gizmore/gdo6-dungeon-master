<?php
namespace GDO\DungeonMaster\Core\GDT;

use GDO\DB\GDT_Object;
use GDO\DungeonMaster\Core\DM_Item;

final class GDT_DMItem extends GDT_Object
{
	public function defaultLabel() { return $this->label('item'); }
	
	public function __construct()
	{
		$this->table(DM_Item::table());
	}
}