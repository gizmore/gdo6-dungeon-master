<?php
namespace GDO\DungeonMaster;

use GDO\DungeonMaster\Core\DM_Player;
use GDO\User\GDO_User;

trait MethodDM
{
	public function isUserRequired() { return true; }
	public function isPlayerRequired() { return true; }
	public function isPlayerForbidden() { return false; }
	
	public function getPlayer(GDO_User $user=null)
	{
		$user = $user ? $user : GDO_User::current();
		return DM_Player::getByUserId($user->getID());
	}
	
	public function execMethod()
	{
		if ($this->isPlayerForbidden())
		{
			if ($this->getPlayer())
			{
				return $this->error('err_reset_first');
			}
		}
		elseif ($this->isPlayerRequired())
		{
			if (!$this->getPlayer())
			{
				return $this->error('err_player_required');
			}
		}
		return $this->execWrap();
	}
	
}
