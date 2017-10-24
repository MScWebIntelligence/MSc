angular.module('mscApp').controller('usersController',function($scope, $window,  $routeParams, $http) {
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

        $http.post('/MSc/api/users/actions.php', data, config)
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

        $http.post('/MSc/api/users/actions.php', data, config)
            .success(function (data, status, headers, config) {
                $scope.PostDataResponse = data;
                $window.location.href = data.url;
            })
            .error(function (data, status, header, config) {
                $scope.ResponseDetails = "Data: " + data +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
    };

    $scope.getUserById = function() {
        $http({
            method: 'GET',
            url: '/MSc/api/actions.php',
            params: { "action" : "getById" , "id" : $routeParams.id }

        }).then(function (response) {

            // on success
            $scope.user = response.data[0];

            console.log($scope.user)

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };
});