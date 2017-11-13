<?php
namespace GDO\DungeonMaster\Core;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_Object;
use GDO\User\GDT_User;
use GDO\User\GDT_Gender;
use GDO\DungeonMaster\Util\DM_Loader;

class DM_Player extends GDO
{
	use WithAttributes;
	
	public function gdoColumns()
	{
		$fields = array(
			GDT_AutoInc::make('player_id'),
			GDT_User::make('player_user'),
		);
		return array_merge($fields, DM_Loader::instance()->loadPersistentAttributes());
	}
	
	public static function getByUserId($uid) { return self::getBy('player_user', $uid); }
	
}
