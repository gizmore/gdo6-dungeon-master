<?php
namespace GDO\DungeonMaster\Method;

use GDO\DungeonMaster\MethodDM;
use GDO\UI\GDT_Confirm;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Submit;
use GDO\DungeonMaster\Core\DM_Player;

final class Reset extends MethodForm
{
	use MethodDM;

	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			GDT_Confirm::make('confirm')->confirmation(t('i_am_sure')),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}

	public function formValidated(GDT_Form $form)
	{
		return $this->resetPlayer($this->getPlayer());
	}
	
	public function resetPlayer(DM_Player $player)
	{
		$player->delete();
		return $this->message('msg_player_deleted');
	}
	
}
