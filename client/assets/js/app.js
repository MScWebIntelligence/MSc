var mscApp = angular.module('mscApp', ['ngRoute']);

mscApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.when('/register', {
            templateUrl: 'client/views/users/register.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/login', {
            templateUrl: 'client/views/users/login.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/', {
            templateUrl: 'client/views/users/login.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/user/:id', {
            templateUrl: 'client/views/users/profile.html',
            controller: 'usersController'
        }).when('/searchbooks', {
            templateUrl: 'client/views/books/searchBooks.html',
            controller: 'booksController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('page/:pages', {
            templateUrl: function (routeParams) {
                return 'views/' + routeParams.pages + '.html';
            }
        }).
        otherwise({
            redirectTo: '/#login'
        });
    }]);