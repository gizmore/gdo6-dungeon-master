<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DB\GDT_String;
use GDO\DungeonMaster\Util\DM_Loader;

class Race extends GDT_String
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function __construct()
	{
		$this->min(0);
		$this->max(16);
		$this->ascii();
	}
	
	public function apply(DM_Player $player)
	{
		foreach (DM_Loader::instance()->loadRaces()[$this->getVar()]['A'] as $attr => $value)
		{
			$player->adjust($attr, $value);
		}
	}
	
}
