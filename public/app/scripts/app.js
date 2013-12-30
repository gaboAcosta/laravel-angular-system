'use strict';

angular.module('mainApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute',
  'ui.bootstrap'
])
  .config(function ($routeProvider,$httpProvider,$interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

    $routeProvider
      .when('/', {
        templateUrl: '/home',
        controller: 'MainCtrl'
      })
      .when('/login', {
        templateUrl: '/login',
        controller: 'LoginCtrl'
      })
      .when('/test', {
        templateUrl: '/acl',
        controller: 'MainCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
    var interceptor = ['$location', '$q','$rootScope','$window', function($location, $q, $rootScope,$window) {
      function success(response) {
        return response;
      }

      function error(response) {

        if(response.status === 401) {
          $rootScope.lastPath = $location.path();
          $location.path('/login');
          return $q.reject(response);
        } else if(response.status === 403){
          $window.alert("You don't have permission to the requested access");
          return $q.reject(response);
        }
        else {
          return $q.reject(response);
        }
      }

      return function(promise) {
        return promise.then(success, error);
      }
    }];

    $httpProvider.responseInterceptors.push(interceptor);
  });
