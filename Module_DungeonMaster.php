<?php
namespace GDO\DungeonMaster;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\DungeonMaster\Map\Generators\InitialMarketplace;
use GDO\DungeonMaster\Map\DM_Floor;
use GDO\DungeonMaster\Map\DM_Tile;

final class Module_DungeonMaster extends GDO_Module
{
	public $module_priority = 100;
	
	public function getClasses()
	{
		return array(
			"GDO\DungeonMaster\Core\DM_Player",
			"GDO\DungeonMaster\Core\DM_Item",
			"GDO\DungeonMaster\Map\DM_Floor",
			"GDO\DungeonMaster\Map\DM_Tile",
		);
	}
	
	public function onInstall()
	{
// 		if (!DM_Tile::table()->countWhere())
		{
			$gen = InitialMarketplace::instance();
			$floor = $gen->generateFloor('main');
			$gen->generateAtFloor(0, 0, $floor);
		}
	}
	
	public function onIncludeScripts()
	{
		$this->addJavascript('js/dm-core.js');
		$this->addJavascript('js/model/dm-player.js');
		$this->addJavascript('js/model/dm-item.js');
		$this->addJavascript('js/model/dm-tile.js');
		$this->addJavascript('js/model/dm-floor.js');
		$this->addJavascript('js/model/dm-map.js');
		$this->addJavascript('js/srvc/dm-map-srvc.js');
		$this->addJavascript('js/srvc/dm-item-srvc.js');
		$this->addJavascript('js/srvc/dm-player-srvc.js');
		$this->addJavascript('js/ctrl/dm-map-ctrl.js');
		$this->addJavascript('js/ctrl/dm-map-edit-ctrl.js');
		$this->addJavascript('js/ctrl/dm-item-ctrl.js');
		$this->addJavascript('js/ctrl/dm-main-ctrl.js');
		$this->addJavascript('js/dialog/dm-action-dlg.js');
		$this->addJavascript('js/dialog/dm-tile-type-dlg.js');
		
		$this->addCSS('css/dm-material.css');
	}

	public function hookLeftBar(GDT_Bar $bar)
	{
		if (module_enabled('Angular'))
		{
			$bar->addField(GDT_Link::make()->href(href('DungeonMaster', 'Game'))->label('btn_game'));
		}
	}
	
}
