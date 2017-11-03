<?php
namespace GDO\DungeonMaster\Core;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;

class DM_Player extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('player_id'),
		);
	}
	
}
