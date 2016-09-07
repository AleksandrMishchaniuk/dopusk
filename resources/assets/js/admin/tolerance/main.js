var app = angular.module('ToleranceApp', [])
                  .constant('API_URL', 'http://dopusk.local/admin/api/v1/');

app.controller('ToleranceAppCtrl', function($scope, $http, API_URL){
  $http.get(API_URL + 'tolerances').success(buildGrid);

  function buildGrid(responce){
    $scope.tolerances = responce;
    $scope.ranges = getKeys($scope.tolerances);
    $scope.systems = getKeys($scope.tolerances[$scope.ranges[0]]);
    $scope.qualities = getKeys($scope.tolerances[$scope.ranges[0]][$scope.systems[0]]);
    $scope.fields = getKeys($scope.tolerances[$scope.ranges[0]][$scope.systems[0]][[$scope.qualities[0]]]);
    $scope.cur_range = $scope.ranges[0];
    $scope.cur_system = $scope.systems[0];
    $scope.grid = $scope.tolerances[$scope.cur_range][$scope.cur_system];
    console.log($scope.fields);
    console.log($scope.grid);
  }

  function getKeys(arr) {
    var res = [];
    for (var key in arr) {
      res.push(key);
    }
    return res;
  }
})

app.filter('orderQualities', function(){
  return function(items){
    var arr = [];
    angular.forEach(items, function(item, key){
      arr.push({
        name: key,
        fields: item
      });
    });
    console.log(arr);
    arr = arr.sort(function(a,b){
      if(a === '01'){ return -1; }
      return (parseInt(a) < parseInt(b))? -1: 1;
    });
    return arr;
  }
});
