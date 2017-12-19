'use strict';
angular.module('gdo6').
service('DMCreateCharDlg', function($q, $mdDialog) {
	
	var DMCreateCharDlg = this;
	
	DMCreateCharDlg.open = function() {

		var defer = $q.defer();
		
		function DialogController($scope, $mdDialog) {
			
			console.log('DialogController()', actions);
			$scope.data = {
			};
			$scope.pickAction = function(index) {
				$mdDialog.hide();
				defer.resolve();
				actions[index].action();
			};
			$scope.closeDialog = function() {
				$mdDialog.hide();
				defer.reject();
			};
		}
		
		$mdDialog.show({
			templateUrl: 'GDO/DungeonMaster/js/tpl/dlg/dm-create-char-dlg.html',
			locals: {
			},
			controller: DialogController,
			onComplete: function() {
			}
		});
		
		return defer.promise;
	};

});
