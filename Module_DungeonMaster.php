<?php
namespace GDO\DungeonMaster;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

final class Module_DungeonMaster extends GDO_Module
{
	public function hookLeftBar(GDT_Bar $bar)
	{
		if (module_enabled('Angular'))
		{
			$bar->addField(GDT_Link::make()->href(href('DungeonMaster', 'Game'))->label('btn_game'));
		}
	}
}
