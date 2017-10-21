angular.module('mscApp').controller('usersController',function($scope, $routeParams, $http) {
    $scope.getUsers = function() {
        $http({

            method: 'GET',
            url: '/MSc/api/users/getAllUsers.php'

        }).then(function (response) {

            // on success
            $scope.users = response.data;

            console.log($scope.users)

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

    $scope.getUserById = function() {
        $http({

            method: 'GET',
            url: '/MSc/api/users/getUserById.php',
            params: { "id" : $routeParams.id }

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