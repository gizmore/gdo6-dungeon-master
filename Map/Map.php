<?php
namespace GDO\DungeonMaster\Map;

use GDO\Core\WithInstance;

final class Map
{
	use WithInstance;
	
	/**
	 * @var DM_Floor[]
	 */
	private $floors = [];
	public function addFloor(DM_Floor $floor) { $this->floors[$floor->getID()] = $floor; }
	public function getFloor($z) { return $this->floors[$z]; }
	
	public function clear()
	{
		$this->floors = [];
	}
	
	public function getTile($x,$y,$z)
	{
		return $this->getFloor($z)->getTile($x, $y);
	}
	
	
}
