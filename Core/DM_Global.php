<?php
namespace GDO\DungeonMaster\Core;

use GDO\User\GDO_User;

final class DM_Global
{
	public static $MAP;
	
	public static function currentPlayer() { return DM_Player::getByUserId(GDO_User::current()->getID()); }

	public static $NPCS = [];
	public static $ITEMS = [];
	public static $HUMANS = [];
	/**
	 * @var DM_Player[]
	 */
	public static $PLAYERS = [];
	public static $ATTRIBUTES = [];
	public static $RACES = [];
	
	public static function attribute($attr) { return @self::$ATTRIBUTES[$attr]; }
	
	
		
}
