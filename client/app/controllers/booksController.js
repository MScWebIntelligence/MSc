angular.module('mscApp').controller('booksController',function($scope, $window,  $routeParams, $http) {

    $scope.books    = [];
    $scope.busy     = false;
    $scope.more     = true;
    $scope.total    = 0;

    $scope.getData = function (clear) {

        if (clear) {
            $scope.books    = [];
            $scope.more     = true
        }

        if ($scope.busy){
            return;
        }

        $scope.busy = true;

        $http({
            method  : 'POST',
            url     : './api/books.php',
            params  : {
                action : "search" ,
                search : $scope.search ,
                offset : $scope.books.length
            },
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded'
            }

        }).success(function(data){
            //Get the data
            for (var i = 0; i < data.books.length; i++) {
                $scope.books.push(data.books[i]);
            }

            $scope.busy     = false;
            $scope.total    = data.total;
            $scope.more     = data.more;
        });
    };


    // get book by id
    $scope.getBook = function() {
        $http({
            method: 'GET',
            url: './api/books.php',
            params: { "action" : "book" , "bookId" : $routeParams.id }

        }).then(function (response) {

            // on success
            $scope.book = response.data.data;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

    // Add action for a book
    $scope.action = function (action) {
        var data = $.param({
            action: action,
            bookId: $scope.book.id
        });

        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('./api/users.php', data, config)
            .success(function (data, status, headers, config) {
                $scope.PostDataResponse = data;
            })
            .error(function (data, status, header, config) {
                $scope.ResponseDetails = "Data: " + data +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            })
    };
});