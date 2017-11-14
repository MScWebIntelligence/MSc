angular.module('mscApp').controller('usersController',function($scope, $window,  $routeParams, $http , $location) {

    // Register
    $scope.signup = function () {
        var data = $.param({
            firstname: $scope.firstname,
            lastname: $scope.lastname,
            email: $scope.email,
            country: $scope.country,
            city: $scope.city,
            password: $scope.password,
            action: "signup"
        });

        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('/openlibrary.eu/api/users.php', data, config)
            .success(function (data, status, headers, config) {
                $scope.PostDataResponse = data;
                $window.location.href = data.url;
            })
            .error(function (data, status, header, config) {
                $scope.ResponseDetails = "Data: " + data +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            })
    };

    // Sign In
    $scope.signin = function () {
        var data = $.param({
            email: $scope.email,
            password: $scope.password,
            action: "login"
        });

        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('/openlibrary.eu/api/users.php', data, config)
            .success(function (data, status, headers, config) {
                $scope.PostDataResponse = data;
                if (data.success) {
                    $window.location.href = data.url;
                }
            })
            .error(function (data, status, header, config) {
                $scope.ResponseDetails = "Data: " + data +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
    };

    // Get the logged in user
    $scope.getUser = function() {
        $http({
            method: 'GET',
            url: '/openlibrary.eu/api/users.php',
            params: { "action" : "user" }

        }).then(function (response) {

            // on success
            $scope.user = response.data;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

    // Get the user profile
    $scope.getProfile = function() {
        $http({
            method: 'GET',
            url: '/openlibrary.eu/api/users.php',
            params: { "action" : "profile" , "userId" : $routeParams.id }

        }).then(function (response) {

            // on success
            $scope.bookCase = response.data.data.bookcase;
            $scope.profile = response.data.data.profile;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

    // logout user
    $scope.logout = function() {
        $http({
            method: 'GET',
            url: '/openlibrary.eu/api/users.php',
            params: { "action" : "logout" }

        }).then(function (response) {

            // on success
            $scope.user = response.data;
            $window.location.href = "/openlibrary.eu/";

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };
});