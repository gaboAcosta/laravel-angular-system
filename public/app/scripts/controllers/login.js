/**
 * Created with JetBrains PhpStorm.
 * User: workzentre
 * Date: 12/27/13
 * Time: 2:54 PM
 * To change this template use File | Settings | File Templates.
 */

angular.module('mainApp')
.controller('LoginCtrl',function($scope,$http,$location,$rootScope){
  $scope.login = function(){
    var location = '/';
    if($rootScope.lastPath != undefined){
      location = $rootScope.lastPath;
      delete($rootScope.lastPath);
    }
    var password = $scope.password;
    if(! password){
      password = $('#user-password').val();
    }
    $http.post('/session/start',{username:$scope.username,password:password})
      .success(function(){$location.path(location)});
  }
  });