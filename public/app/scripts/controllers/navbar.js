/**
 * Created with JetBrains PhpStorm.
 * User: workzentre
 * Date: 12/28/13
 * Time: 11:01 AM
 * To change this template use File | Settings | File Templates.
 */
angular.module('mainApp')
.controller('NavBarCtrl',function($scope,$location,$http){
    $scope.logout = function(){
      $http.get('/session/end').success(function(data){

          $location.path('/login');

      });
    }

  });