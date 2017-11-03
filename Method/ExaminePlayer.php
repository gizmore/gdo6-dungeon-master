<?php
namespace GDO\DungeonMaster\Method;

use GDO\DungeonMaster\MethodDM;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DungeonMaster\Core\GDT\GDT_DMPlayer;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\Core\GDT_Response;

final class ExaminePlayer extends MethodForm
{
	use MethodDM;
	public function isPlayerRequired() { return false; }

	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			GDT_DMPlayer::make('player'),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}

	public function formValidated(GDT_Form $form)
	{
		return $this->examine($form->getFormValue('player'));
	}
	
	public function examine(DM_Player $player)
	{
		return GDT_Response::makeWith(GDT_DMPlayer::make('player')->gdo($player));
	}
	
}
