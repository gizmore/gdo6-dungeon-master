<div ng-controller="DMMainCtrl">
  <h1>GAME</h1>
<?php
$initJSON = null;
?>
<div
 class="dm-map dm-edit-map"
 ng-controller="DMMapCtrl"
 ng-init='initJSON(<?=json_encode($initJSON)?>)'>
<div ng-repeat="row in floor.TILES track by $index">
<span ng-repeat="tile in row track by $index" class="dm-tile" ng-click="clickTile($index, $parent.$index)">
  <img src="{{tile.image()}}" />
  <item ng-if="tile.ITEMS" ng-repeat="item in tile.ITEMS" class="dm-item"><img src="{{item.image()}}" /></item>
  <player ng-if="tile.PLAYERS" ng-repeat="player in tile.PLAYERS" class="dm-player"><img src="{{player.image()}}" /></item>
</span>
</div>
</div>
</div>
