<?php
namespace GDO\DungeonMaster\Core\GDT;

use GDO\DB\GDT_Object;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\Core\GDT_Template;

final class GDT_DMPlayer extends GDT_Object
{
	public function defaultLabel() { return $this->label('player'); }
	
	public function __construct()
	{
		$this->table(DM_Player::table());
		$this->notNull();
	}
	
	/**
	 * @return \GDO\DungeonMaster\Core\DM_Player
	 */
	public function player()
	{
		return $this->gdo;
	}
	
	public function renderCell()
	{
		return GDT_Template::php('DungeonMaster', 'card/player.php', ['field'=>$this]);
	}
	
	public function renderJSON()
	{
		$player = $this->player();
		return array(
			'hp' => $player->adjusted('HP'),
		);
	}
}