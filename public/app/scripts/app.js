'use strict';

angular.module('mainApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute'
])
  .config(function ($routeProvider,$httpProvider) {
    $routeProvider
      .when('/', {
        templateUrl: '/home',
        controller: 'MainCtrl'
      })
      .when('/login', {
        templateUrl: '/login',
        controller: 'LoginCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
    var interceptor = ['$location', '$q','$rootScope', function($location, $q, $rootScope) {
      function success(response) {
        return response;
      }

      function error(response) {

        if(response.status === 401) {
          $rootScope.lastPath = $location.path();
          $location.path('/login');
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
