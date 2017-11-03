<?php
namespace GDO\DungeonMaster\Map\Generators;

use GDO\DungeonMaster\Map\Generator;
use GDO\DungeonMaster\Map\DM_Tile;

final class InitialMarketplace extends Generator
{
	public function generate()
	{
		$this->fillRect($this->x(0), $this->y(0), 20, 20, DM_Tile::DUST);
		$this->rect($this->x(0), $this->y(0), 20, 20, DM_Tile::CITY_WALL);
		$this->tile($this->x(10), $this->y(20), DM_Tile::CITY_DOOR);
		$this->obstacle($this->x(10), $this->y(10), 'Respawn');
		$this->item(9, 9, 'Club');
	}
}
