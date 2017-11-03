<?php
namespace GDO\DungeonMaster\Map;

use GDO\Core\WithInstance;
use GDO\DungeonMaster\Item\Factory;

abstract class Generator
{
	use WithInstance;
	
	/**
	 * @var DM_Floor
	 */
	private $floor;
	public function floor(DM_Floor $floor) { $this->floor = $floor; return $this; }
	
	private $offX, $offY;
	
	public function generateFloor($name)
	{
		return DM_Floor::getOrCreateByName($name);
	}
	
	public function generateAt($x, $y, $z)
	{
		return $this->generateAtFloor($x, $y, DM_Floor::findById($z));
	}
	
	public function generateAtFloor($x, $y, DM_Floor $floor)
	{
		$this->floor($floor);
		$this->offX = $x;
		$this->offY = $y;
		return $this->generate();
	}
	
	public abstract function generate();
	
	public function x($x) { return $x + $this->offX; }
	public function y($y) { return $y + $this->offY; }
	public function z() { return $this->floor->getID(); }
	
	######################
	### Drawing helper ###
	######################
	public function tile($x, $y, $type)
	{
		$tile = DM_Tile::getOrBlank($x, $y, $this->z());
		if ($tile->getTileType() != $type)
		{
			$tile->setVar('tile_type', $type);
			$tile->save();
		}
		return $tile;
	}

	public function item($x, $y, $itemClass)
	{
		return self::obstacle($x, $y, $itemClass);
	}
	
	public function obstacle($x, $y, $itemClass)
	{
		Factory::instance()->createAt($x, $y, $this->z(), $itemClass);
	}
	
	
	public function rect($x, $y, $w, $h, $type)
	{
		for ($Y=0;$Y<$h;$Y++)
		{
			for ($X=0;$X<$w;$X++)
			{
				if ( ($Y === 0) || ($X === 0) || ($Y === ($h-1)) || ($X === ($w-1)) )
				{
					$this->tile($X+$x, $Y+$y, $type);
				}
			}
		}
	}
	public function fillRect($x, $y, $w, $h, $type)
	{
		for ($Y=0;$Y<$h;$Y++)
		{
			for ($X=0;$X<$w;$X++)
			{
				$this->tile($X+$x, $Y+$y, $type);
			}
		}
	}
	
	
}
