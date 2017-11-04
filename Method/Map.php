<?php
namespace GDO\DungeonMaster\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\DB\GDT_UInt;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Submit;
use GDO\DungeonMaster\Map\GDT_DMTile;
use GDO\DungeonMaster\Map\DM_Tile;
use GDO\Core\GDT_JSONResponse;
use GDO\Core\GDT_Response;
use GDO\DungeonMaster\Map\DM_Floor;

final class Map extends MethodForm
{
	public function createForm(GDT_Form $form)
	{
		$form->addFields(array(
			GDT_UInt::make('x')->bytes(1),
			GDT_UInt::make('y')->bytes(1),
			GDT_UInt::make('z')->bytes(4),
			GDT_UInt::make('w')->bytes(1),
			GDT_UInt::make('h')->bytes(1),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}
	
	public function formValidated(GDT_Form $form)
	{
		return $this->renderMap($form->getFormVar('x'), $form->getFormVar('y'), $form->getFormVar('z'), $form->getFormVar('w'), $form->getFormVar('h'));
	}
	
	public function renderMap($x, $y, $z, $w, $h)
	{
		$json = [];
		$floor = DM_Floor::findById($z);
		foreach ($floor->tiles() as $tile)
		{
			$json = array_merge($json, $tile->renderJSON());
		}
		return GDT_Response::makeWith(GDT_JSONResponse::make()->json($json));
	}

}
