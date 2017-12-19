<?php
namespace GDO\DungeonMaster\Method;

use GDO\DungeonMaster\MethodDM;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Submit;
use GDO\DungeonMaster\Core\DM_Global;
use GDO\DungeonMaster\Core\DM_Player;

final class Join extends MethodForm
{
	use MethodDM;
	
	public function isPlayerRequired() { return false; }
	
	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}
	
	public function formValidated(GDT_Form $form)
	{
		if ($player = $this->getPlayer())
		{
			return $this->joinPlayer($player);
		}
		else
		{
			return $this->requestPlayer();
		}
	}
	
	public function joinPlayer(DM_Player $player)
	{
		DM_Global::$PLAYERS[$user->getID()] = DM_Player::getById($user->getID());
	}
	
	public function requestPlayer()
	{
		return $this->error('err_create_player');
	}
	
}
