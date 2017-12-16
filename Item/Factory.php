<?php
namespace GDO\DungeonMaster\Item;

use GDO\Core\WithInstance;
use GDO\DungeonMaster\Map\Loader;
use GDO\DungeonMaster\Util\DM_Loader;
use GDO\DungeonMaster\Util\Dice;
use GDO\DungeonMaster\Core\DM_Item;

final class Factory
{
	use WithInstance;
	
	public function createAt($x, $y, $z, $itemClass)
	{
		if ($item = $this->instanciate($itemClass))
		{
			$item->setVars(array(
				'X' => $x,
				'Y' => $y,
				'Floor' => $z,
			));
			return $item->replace();
		}
	}
		
	public function instanciate($itemClass)
	{
		if ($data = DM_Loader::instance()->loadItemData($itemClass))
		{
			$initial = Dice::randomItemStats($data);
			$item = DM_Item::blank(array(
				'item_class' => $itemClass,
			));
			return $item;
		}
	}
}