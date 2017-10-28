angular.module('mscApp').controller('booksController',function($scope, $window,  $routeParams, $http) {
    // get books
    $scope.getBooks = function() {
        $http({
            method: 'GET',
            url: '/MSc/api/books.php',
            params: { "action" : "search" , "search" : $scope.search }

        }).then(function (response) {

            // on success
            $scope.searchResult = response.data;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

});