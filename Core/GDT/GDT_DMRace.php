<?php
namespace GDO\DungeonMaster\Core\GDT;

use GDO\DB\GDT_Enum;
use GDO\DungeonMaster\Util\DM_Loader;

final class GDT_DMRace extends GDT_Enum
{
	public function __construct()
	{
		$this->enumValues(...array_keys(DM_Loader::instance()->loadRaces()));
	}
		
	public function playerRaces()
	{
		$values = [];
		foreach (DM_Loader::instance()->loadRaces() as $race => $data)
		{
			if ($data['P'])
			{
				$values[] = $race;
			}
		}
		return $this->enumValues(...$values);
	}
}