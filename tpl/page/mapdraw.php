<?php
use GDO\DB\GDT_Object;
use GDO\DungeonMaster\Map\DM_Floor;
use GDO\Form\GDT_Form;
use GDO\DB\GDT_ObjectSelect;
use GDO\Form\GDT_Submit;

$floor = null;

$form = GDT_Form::make();
$form->addFields(array(
	GDT_ObjectSelect::make('floor')->table(DM_Floor::table()),
	GDT_Submit::make(),
));
if (count($_POST))
{
	if ($form->validateForm())
	{
		$floor = $form->getFormValue('floor');
	}
}
?>
<?php if ($floor) :
$initJSON = array(
	'floor' => $floor->getID(),
);
?>
<div
 ng-controller="DMMapEditCtrl"
 ng-init='initJSON(<?=json_encode($initJSON)?>)'>
</div>
<?php else : ?>
<?=$form->render()?>
<?php endif; ?>