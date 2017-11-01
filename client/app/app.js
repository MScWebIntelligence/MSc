var mscApp = angular.module('mscApp',['ngRoute' , 'infinite-scroll' , 'ngSanitize']);

mscApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider.when('/register', {
            templateUrl: 'client/app/views/users/register.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/login', {
            templateUrl: 'client/app/views/users/login.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/', {
            templateUrl: 'client/app/views/users/login.html',
            controller: 'usersController',
            css: ['client/assets/css/form-elements.css', 'client/assets/css/style.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/user/:id', {
            templateUrl: 'client/app/views/users/profile.html',
            controller: 'usersController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/searchbooks', {
            templateUrl: 'client/app/views/books/searchBooks.html',
            controller: 'booksController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/book/:id', {
            templateUrl: 'client/app/views/books/showBook.html',
            controller: 'booksController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('page/:pages', {
            templateUrl: function (routeParams) {
                return 'views/' + routeParams.pages + '.html';
            }
        }).otherwise({
            redirectTo: '/#login'
        });

        $locationProvider.html5Mode(true);
    }]);