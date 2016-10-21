var app = angular.module('ToleranceApp', [])
                  .constant('API_URL', 'http://dopusk.local/admin/api/v1/');

app.service('orderedQualities', function(){
  var array = [];
  var set = function(val){
    array = val;
  };
  var get = function(){
    return array;
  };
  return {
    set: set,
    get: get
  };
});

app.controller('ToleranceAppCtrl', function($scope, $http, API_URL, orderedQualities){
  $http.get(API_URL + 'tolerances').success(buildGrid);

  function buildGrid(responce){
    $scope.tolerances = responce;
    $scope.ranges = getKeys($scope.tolerances);
    $scope.systems = getKeys($scope.tolerances[$scope.ranges[0]]);
    $scope.qualities = getKeys($scope.tolerances[$scope.ranges[0]][$scope.systems[0]]);
    $scope.fields = getKeys($scope.tolerances[$scope.ranges[0]][$scope.systems[0]][[$scope.qualities[0]]]);
    $scope.cur_range = $scope.ranges[0];
    $scope.cur_system = $scope.systems[0];
    $scope.refreshGrid();
    console.log($scope.ranges);
    console.log($scope.systems);
  }

  $scope.refreshGrid = function(){
    console.log($scope.cur_range);
    orderedQualities.set([]);
    $scope.grid = $scope.tolerances[$scope.cur_range][$scope.cur_system];
    resetCurItemForm();
  };

  $scope.editField = function(item, field_name, quality_name){
    $scope.cur_max_val = item['max'];
    $scope.cur_min_val = item['min'];
    $scope.cur_item = item;
    $scope.cur_field_name = field_name;
    $scope.cur_quality_name = quality_name;
  };

  $scope.updateField = function(){
    $scope.cur_item['max'] = $scope.cur_max_val;
    $scope.cur_item['min'] = $scope.cur_min_val;
  };

  $scope.fieldBySystem = function(text){
    return ($scope.cur_system == 'hole')? text.toUpperCase(): text;
  }

  function getKeys(arr) {
    var res = [];
    for (var key in arr) {
      res.push(key);
    }
    return res;
  }

  function resetCurItemForm(){
    $scope.cur_max_val = '';
    $scope.cur_min_val = '';
    $scope.cur_item = undefined;
    $scope.cur_field_name = '';
    $scope.cur_quality_name = '';
  }
});

app.filter('orderQualities', function(orderedQualities){
  return function(items){
    var arr = orderedQualities.get();
    if (!arr.length) {
      angular.forEach(items, function(item, key){
        arr.push({
          name: key,
          fields: item
        });
      });
      arr = arr.sort(function(a,b){
        if(a.name === '01'){ return -1 }
        if(b.name === '01'){ return 1 }
        return (parseFloat(a.name) < parseFloat(b.name))? -1: 1;
      });
      orderedQualities.set(arr);
    }
    return arr;
  }
});
