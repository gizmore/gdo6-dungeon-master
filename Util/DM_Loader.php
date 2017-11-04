<?php
namespace GDO\DungeonMaster\Util;

use GDO\Core\WithInstance;
use GDO\File\Filewalker;
use GDO\DungeonMaster\Core\DM_Global;
use GDO\Util\Strings;

final class DM_Loader
{
	use WithInstance;
	
	private function racePath() { return GWF_PATH . "GDO/DungeonMaster/data/race.php"; }
	public function loadRaces()
	{
		if (!DM_Global::$RACES)
		{
			DM_Global::$RACES = require_once $this->racePath();
		}
		return DM_Global::$RACES;
	}
	
	private function attributePath() { return GWF_PATH . "GDO/DungeonMaster/Attribute"; }
	public function loadAttributes()
	{
		if (!DM_Global::$ATTRIBUTES)
		{
			Filewalker::traverse($this->attributePath(), function($entry, $path){
				$entry = substr($entry, 0, -4);
				$path = 'GDO/'.Strings::substrFrom(substr($path, 0, -4), '/GDO/');
				$klass = str_replace('/', '\\', $path);
				DM_Global::$ATTRIBUTES[$entry] = $klass::make($entry);
			});
			ksort(DM_Global::$ATTRIBUTES);
		}
		return DM_Global::$ATTRIBUTES;
	}
	
	public function loadPersistentAttributes()
	{
		$attrs = [];
		foreach ($this->loadAttributes() as $attr => $gdoType)
		{
			if (!$gdoType->isComputed())
			{
				$attrs[$attr] = $gdoType;
			}
		}
		return $attrs;
	}
	
	private function itemsPath() { return GWF_PATH . "GDO/DungeonMaster/data/items.php"; }
	public function loadItemData($itemClass)
	{
		static $ITEM_DATA;
		if (!$ITEM_DATA)
		{
			$ITEM_DATA = require_once $this->itemsPath();
		}
		return @$ITEM_DATA[$itemClass];
	}
}
