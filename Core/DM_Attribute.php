<?php
namespace GDO\DungeonMaster\Core;

trait DM_Attribute
{
	public abstract function isComputed();
	public abstract function apply(DM_Player $player);
	
	public static function register(DM_Attribute $attribute)
	{
		DM_Global::$ATTRIBUTES[$attribute->name] = $attribute;
	}
	
}