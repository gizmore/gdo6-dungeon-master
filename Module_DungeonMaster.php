<?php
namespace GDO\DungeonMaster;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

final class Module_DungeonMaster extends GDO_Module
{
	public $module_priority = 100;
	
	public function getClasses()
	{
		return array(
			"\GDO\DungeonMaster\Core\DM_Player",
			"\GDO\DungeonMaster\Core\DM_Item",
		);
	}
	
	
	public function onIncludeScripts()
	{
		$this->addJavascript('js/model/dm-player.js');
		$this->addJavascript('js/dm-core.js');
		$this->addJavascript('js/dm-item-ctrl.js');
		$this->addJavascript('js/dm-main-ctrl.js');
	}

	public function hookLeftBar(GDT_Bar $bar)
	{
		if (module_enabled('Angular'))
		{
			$bar->addField(GDT_Link::make()->href(href('DungeonMaster', 'Game'))->label('btn_game'));
		}
	}
	
}
