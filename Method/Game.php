<?php
namespace GDO\DungeonMaster\Method;

use GDO\Core\Method;
use GDO\Core\GDT_Template;

final class Game extends Method
{
	public function isUserRequired() { return true; }
	
	public function execute()
	{
		return GDT_Template::responsePHP('DungeonMaster', 'page/game.php');
	}
	
}
