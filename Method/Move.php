<?php
namespace GDO\DungeonMaster\Method;

use GDO\DungeonMaster\MethodDM;
use GDO\DungeonMaster\Attribute\Gender;
use GDO\User\GDO_User;
use GDO\DungeonMaster\Core\DM_Player;
use GDO\DungeonMaster\Core\GDT\GDT_DMRace;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Core\GDT_Hook;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\DungeonMaster\Util\DM_Loader;
use GDO\DungeonMaster\Attribute\Direction;
use GDO\DungeonMaster\Core\DM_Global;

final class Move extends MethodForm
{
	use MethodDM;
	
	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			Direction::make('direction')->noFloor()->notNull(),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}

	public function formValidated(GDT_Form $form)
	{
		return $this->move(DM_Global::currentPlayer(), $form->getVar('direction'));
	}
	
	public function move(DM_Player $player, $direction)
	{
		$x = $player->getX();
		$y = $player->getY();
		$x = $this->transposeX($x, $direction);
		$y = $this->transposeY($y, $direction);
		list($x, $y) = $direction->transpose($x, $y);
	}
	
	private function transposeX($x, $direction)
	{
		
	}

	private function transposeY($y, $direction)
	{
		
	}
}
