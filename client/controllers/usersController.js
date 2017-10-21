angular.module('mscApp').controller('usersController',function($scope, $http) {
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
});