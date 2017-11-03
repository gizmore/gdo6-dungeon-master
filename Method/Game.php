<?php
namespace GDO\DungeonMaster\Method;

use GDO\Core\Method;
use GDO\Core\GDT_Template;
use GDO\UI\MethodPage;

final class Game extends MethodPage
{
	public function isUserRequired() { return true; }
	
}
