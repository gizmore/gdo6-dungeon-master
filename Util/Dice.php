<?php
namespace GDO\DungeonMaster\Util;

use GDO\DungeonMaster\Core\DM_Global;

final class Dice
{
	public static function random($min=1, $max=10000)
	{
		return rand((int)$min, (int)$max);
	}
	
	public static function minmax($minmax)
	{
		$min = is_array($minmax) ? $minmax[0] : $minmax;
		$max = is_array($minmax) ? $minmax[1] : $minmax;
		return self::random($min, $max);
	}
	
	public static function randomItemStats(array $itemData)
	{
		$data = [];
		foreach ($itemData as $attr => $minmax)
		{
			if ($attribute = DM_Global::attribute($attr))
			{
				$data[$attr] = self::minmax($minmax);
			}
		}
		return $data;
	}
}
