/**
 * Created with JetBrains PhpStorm.
 * User: workzentre
 * Date: 12/28/13
 * Time: 10:52 AM
 * To change this template use File | Settings | File Templates.
 */

describe('Controller: NavBarCtrl',function(){
  beforeEach(module('mainApp'));
  var $scope,
    $controller,
    $httpBackend,
    $rootScope,
    NavBarCtrl,
    $window,
    $location;

  $window = {
    location:{

    }
  }

  beforeEach(inject(function($injector){
    $rootScope = $injector.get('$rootScope');
    $scope = $rootScope.$new();
    $httpBackend = $injector.get('$httpBackend');
    $controller = $injector.get('$controller');
    $location = $injector.get('$location');
    NavBarCtrl = $controller('NavBarCtrl',{
      $scope:$scope, $window:$window
    });
  }));

  beforeEach(function(){
    $httpBackend.verifyNoOutstandingExpectation();
    $httpBackend.verifyNoOutstandingRequest();
  });

  it('Should have a function that logs the user out',function(){
    $httpBackend.expectGET('/session/end').respond({'msg':'logut successful'});
    $scope.logout();
    $httpBackend.flush();
    expect($window.location.href).toBe('/');
  });
});