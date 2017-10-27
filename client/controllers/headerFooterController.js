angular.module('mscApp').controller('headerFooterController',['$location', '$scope' , function($location, $scope) {

    // Check if must show the header and the footer
    if ($location.path() == '/login' || $location.path() == '/register' || $location.path() == '') {
        $scope.headerfooter = false;
    }
    else {
        $scope.headerfooter = true;
    }
}]);