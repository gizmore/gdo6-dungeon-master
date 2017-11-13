'use strict';
angular.module('gdo6').
service('DMActionDlg', function($q, $mdDialog) {
	
	var DMActionDlg = this;
	
	DMActionDlg.open = function(actions) {

		var defer = $q.defer();
		
		function DialogController($scope, $mdDialog, actions) {
			
			console.log('DialogController()', actions);
			$scope.data = {
				actions: actions,
			};
			$scope.pickAction = function(index) {
				$mdDialog.hide();
				defer.resolve();
				actions[index].action();
				defer.reject();
			};
			$scope.closeDialog = function() {
				$mdDialog.hide();
				defer.reject();
			};
		}
		
		$mdDialog.show({
			templateUrl: 'GDO/DungeonMaster/js/tpl/dlg/dm-action-dlg.html',
			locals: {
				actions: actions,
			},
			controller: DialogController,
			onComplete: function() {
			}
		});
		
		return defer.promise;
	};

});
