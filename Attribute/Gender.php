<?php
namespace GDO\DungeonMaster\Attribute;

use GDO\DungeonMaster\Core\DM_Attribute;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\User\GDT_Gender;

final class Gender extends GDT_Gender
{
	use DM_Attribute;
	public function isComputed() { return false; }
	
	public function apply(DM_Player $player)
	{
		switch ($this->getVar())
		{
			case self::MALE: return $this->applyMale($player);
			case self::FEMALE; return $this->applyFemale($player);
		}
	}
	
	public function applyMale(DM_Player $player)
	{
		$player->adjust('Strength', 1);
	}
	
	public function applyFemale(DM_Player $player)
	{
		$player->adjust('Strength', -1);
	}
	
	public function validate($value)
	{
		return ($value === self::MALE || $value === self::FEMALE) ? true : $this->errorNotNull();
	}
	
	
}
