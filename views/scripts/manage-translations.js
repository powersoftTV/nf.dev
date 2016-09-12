var nv = angular.module('nv',[
    'ngRoute',
    'langController'
]);
nv.config(function($routeProvider, $locationProvider) {
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
});

var langController= angular.module('langController',[]);
langController.controller("GetWords", function($scope, $http, $location) {
        $scope.words = {};
        $scope.words.doClick = function(item) {
            var responsePromise = $http.get(ajax+'get-words'+'&item='+item);
            responsePromise.success(function(data, status, headers, config) {
               $scope.words.response = data;
               $location.hash(item);
               //history.pushState(1,item);
            });
        }
} )
