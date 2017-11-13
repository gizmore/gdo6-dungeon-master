<div ng-controller="DMMainCtrl">
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
 class="dm-map dm-edit-map"
 ng-controller="DMMapEditCtrl"
 ng-init='initJSON(<?=json_encode($initJSON)?>)'>
<div ng-repeat="row in floor.TILES track by $index">
<span ng-repeat="tile in row track by $index" class="dm-tile" ng-click="clickTile($index, $parent.$index)">
  <img src="{{tile.image()}}" />
  <item ng-if="tile.ITEMS" ng-repeat="item in tile.ITEMS" class="dm-item"><img src="{{item.image()}}" /></item>
  <player ng-if="tile.PLAYERS" ng-repeat="player in tile.PLAYERS" class="dm-player"><img src="{{player.image()}}" /></item>
</span>
</div>
</div>
<?php else : ?>
<?=$form->render()?>
<?php endif; ?>
</div>
