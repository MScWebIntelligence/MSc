var mscApp = angular.module('mscApp',['ngRoute' , 'infinite-scroll']);

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
            controller: 'usersController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/searchbooks', {
            templateUrl: 'client/views/books/searchBooks.html',
            controller: 'booksController',
            css: ['client/assets/css/bookstore.css', 'client/assets/bootstrap/css/bootstrap.min.css']
        }).when('/book/:id', {
            templateUrl: 'client/views/books/showBook.html',
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

mscApp.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});