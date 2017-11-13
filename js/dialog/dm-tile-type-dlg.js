'use strict';
angular.module('gdo6').
service('DMTileTypeDlg', function($q, $mdDialog) {
	
	var DMTileTypeDlg = this;
	
	DMTileTypeDlg.open = function(tile) {

		var defer = $q.defer();
		
		function DialogController($scope, $mdDialog, GDOWebsocketSrvc, tile) {
			
			console.log('DialogController()', tile);
			$scope.data = {
				tile: tile,
				tiles: [
					{id:1,name:'Dust'},
					{id:2,name:'Grass'},
					]
			};
			$scope.pickTile = function(newType) {
				$mdDialog.hide();
				defer.resolve(newType);
				$scope.sendDrawCommand(newType);
			};
			$scope.closeDialog = function() {
				$mdDialog.hide();
				defer.reject();
			};
			$scope.sendDrawCommand = function(newType) {
				console.log('DialogController.sendDrawCommand()', newType);
				var gwsMessage = new GWS_Message().cmd(0x6220); //.sync();
				gwsMessage.write8(tile.X).write8(tile.Y).write32(tile.z());
				gwsMessage.write8(newType);
				GDOWebsocketSrvc.sendBinary(gwsMessage);
			};

		}
		
		$mdDialog.show({
			templateUrl: 'GDO/DungeonMaster/js/tpl/dlg/dm-tile-type-dlg.html',
			locals: {
				tile: tile,
			},
			controller: DialogController,
			onComplete: function() {
			}
		});
		
		return defer.promise;
	};

});
