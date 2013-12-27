/**
 * Created with JetBrains PhpStorm.
 * User: workzentre
 * Date: 12/27/13
 * Time: 3:06 PM
 * To change this template use File | Settings | File Templates.
 */
'use strict';

describe('Controller: LoginCtrl', function () {

  // load the controller's module
  beforeEach(module('mainApp'));

  var LoginCtrl
    , scope
    , $httpBackend
    , $http
    ,$location
    ,$rootScope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller,$injector) {
    $rootScope = $injector.get('$rootScope');
    scope = $rootScope.$new();
    LoginCtrl = $controller('LoginCtrl', {
      $scope: scope
    });
    $httpBackend = $injector.get('$httpBackend');
    $http = $injector.get('$http');
    $location = $injector.get('$location');
  }));

  afterEach(function(){
    $httpBackend.verifyNoOutstandingExpectation();
    $httpBackend.verifyNoOutstandingRequest();
  });

  it('should redirect the user to the login screen',function(){
    $httpBackend.expectGET('/home').respond(401);
    $location.path('/');
    $http.get('/home');
    $httpBackend.flush();
    expect($location.path()).toBe('/login');
    expect($rootScope.lastPath).toBe('/');
  });

  it('should login a user with the correct credentials',function(){
    $httpBackend.expectGET('/home').respond(401);
    $location.path('/');
    $http.get('/home');
    $httpBackend.flush();

    scope.username = 'asd';
    scope.password = 'asd';
    $httpBackend.expectPOST('/session/start',{username:scope.username,password:scope.password}).respond({message:'login successful'});
    scope.login();
    $httpBackend.flush();

    expect($location.path()).toBe('/');
  });

});
