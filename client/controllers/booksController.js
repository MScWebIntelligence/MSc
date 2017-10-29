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
            $scope.offset = 0;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

    // get books next pages
    $scope.getBooksPaginated = function() {

        if ($scope.loadingBooks) return;

        $scope.loadingBooks = true;

        if ($scope.offset == undefined) {
            $scope.offset = 0;
        }
        else {
            $scope.offset = $scope.offset + 20;
        }

        $http({
            method: 'GET',
            url: '/MSc/api/books.php',
            params: { "action" : "search" , "search" : $scope.search , "offset" : $scope.offset }

        }).then(function (response) {

            if ($scope.searchResult == undefined || $scope.searchResult.books == undefined) return;
            // on success
            $scope.searchResult.books = $scope.searchResult.books.concat(response.data.books);

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
        $scope.loadingBooks = false;
    };
});