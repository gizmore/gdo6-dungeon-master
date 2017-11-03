<?php
namespace GDO\DungeonMaster\Util;

use GDO\Core\WithInstance;
use GDO\File\Filewalker;
use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Global;

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
				$klass = "GDO\DungeonMaster\Attribute\\$entry";
				DM_Global::$ATTRIBUTES[$entry] = $klass::make($entry);
			});
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
}
