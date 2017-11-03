<?php
namespace GDO\DungeonMaster\Core;

use GDO\Core\WithName;

abstract class DM_Attribute
{
	use WithName;
	
	public static $ALL = []; 
	
	public static function register(DM_Attribute $attribute)
	{
		
	}
	
}