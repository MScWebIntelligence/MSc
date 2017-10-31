angular.module('mscApp').controller('booksController',function($scope, $window,  $routeParams, $http) {

    $scope.books    = [];
    $scope.busy     = false;
    $scope.more     = true;

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
            url     : '/MSc/api/books.php',
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

            $scope.busy = false;
            $scope.more = data.more;
        });

    };








    // get book by id
    $scope.getBook = function() {
        $http({
            method: 'GET',
            url: '/MSc/api/books.php',
            params: { "action" : "book" , "bookId" : $routeParams.id }

        }).then(function (response) {

            // on success
            $scope.book = response.data.data;

        }, function (response) {

            // on error
            console.log(response.data,response.status);

        });
    };

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
    // $scope.getBooksPaginated = function() {
    //
    //     if ($scope.loadingBooks) return;
    //
    //     $scope.loadingBooks = true;
    //     console.log("Temp " + $scope.offset);
    //
    //     // if ($scope.offset == undefined || $scope.offset == 0) {
    //     //     $scope.offset = 0;
    //     // } else {
    //     //     $scope.offset = $scope.offset + 12;
    //     // }
    //     console.log("Temp 2" + $scope.offset);
    //
    //
    //     $http({
    //         method: 'GET',
    //         url: '/MSc/api/books.php',
    //         params: { "action" : "search" , "search" : $scope.search , "offset" : $scope.offset }
    //
    //     }).then(function (response) {
    //
    //         if ($scope.searchResult == undefined || $scope.searchResult.books == undefined) return;
    //         // on success
    //         $scope.searchResult.books = $scope.searchResult.books.concat(response.data.books);
    //         $scope.loadingBooks = false;
    //         $scope.offset = $scope.offset + 12;
    //         console.log("In: " + $scope.loadingBooks + "Offset: " + $scope.offset);
    //
    //     }, function (response) {
    //
    //         // on error
    //         console.log(response.data,response.status);
    //
    //     });
    // };

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

        $http.post('/MSc/api/users.php', data, config)
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