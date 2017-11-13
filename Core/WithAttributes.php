<?php
namespace GDO\DungeonMaster\Core;

trait WithAttributes
{
	public function getX() { return $this->getVar('X'); }
	public function getY() { return $this->getVar('Y'); }
	public function getZ() { return $this->getVar('Floor'); }
	
	
}
