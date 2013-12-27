'use strict';

describe('Controller: MainCtrl', function () {

  // load the controller's module
  beforeEach(module('mainApp'));

  var MainCtrl
    , scope
    , $httpBackend
    , $http
    ,$location;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope,$injector) {
    scope = $rootScope.$new();
    MainCtrl = $controller('MainCtrl', {
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

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });

  it('should redirect the user to the login screen',function(){
    $httpBackend.expectGET('/home').respond(401);
    $http.get('/home');
    $location.path('/');
    $httpBackend.flush();
    expect($location.path()).toBe('/login');
  });
});
