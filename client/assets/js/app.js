var mscApp = angular.module('mscApp', ['ngRoute']);

mscApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/users', {
            templateUrl: 'client/views/users/allUsers.html',
            controller: 'usersController'
        }).
        when('/user/:id', {
            templateUrl: 'client/views/users/getUserById.html',
            controller: 'usersController'
        }).
        otherwise({
            redirectTo: '/'
        });
    }]);