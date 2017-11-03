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

final class Start extends MethodForm
{
	use MethodDM;
	
	public function isPlayerForbidden() { return true; }
	
	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			GDT_DMRace::make('race')->playerRaces()->initial('Human')->notNull(),
			Gender::make('gender'),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}

	public function formValidated(GDT_Form $form)
	{
		return $this->createPlayer(GDO_User::current(), $form->getFormVar('race'), $form->getFormVar('gender'));
	}
	
	public function createPlayer(GDO_User $user=null, $race, $gender)
	{
		$player = DM_Player::blank(array(
			'player_user' => $user->getID(),
			'Race' => $race,
			'Gender' => $gender,
		));
		foreach (DM_Loader::instance()->loadRaces()[$race]['B'] as $attr => $value)
		{
			$player->setVar($attr, $value);
		}
		$player->insert();
		GDT_Hook::call('PlayerCreated', [$player]);
		return $this->message('msg_player_created');
	}
	
}
