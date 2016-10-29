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
    $scope.ranges = getItems($scope.tolerances);
    $scope.systems = getItems($scope.tolerances[$scope.ranges[0]['id']]['systems']);
    $scope.qualities = getItems($scope.tolerances[$scope.ranges[0]['id']]['systems']
                                                [$scope.systems[0]['title']]['qualities']);
    $scope.fields = getItems($scope.tolerances[$scope.ranges[0]['id']]['systems']
                                             [$scope.systems[0]['title']]['qualities']
                                             [$scope.qualities[0]['id']]['fields']);
    $scope.cur_range = $scope.ranges[0]['id'];
    $scope.cur_system = $scope.systems[0]['title'];
    $scope.refreshGrid();
  }

  $scope.refreshGrid = function(){
    orderedQualities.set([]);
    $scope.grid = $scope.tolerances[$scope.cur_range]['systems']
                                   [$scope.cur_system]['qualities'];
    resetCurItemForm();
  };

  $scope.editField = function(field, quality){
    $scope.cur_max_val = field.tolerance.max;
    $scope.cur_min_val = field.tolerance.min;
    $scope.cur_item = field.tolerance;
    $scope.cur_field_name = field.title;
    $scope.cur_quality_name = quality.title;
    $scope.cur_field = field.id;
    $scope.cur_quality = quality.id;
  };

  $scope.updateField = function(){
    var params = {
      max_val: $scope.cur_max_val,
      min_val: $scope.cur_min_val,
      system: $scope.cur_system,
      range_id: $scope.cur_range,
      field_id: $scope.cur_field,
      field_id: $scope.cur_field,
      quality_id: $scope.cur_quality,
      id: $scope.cur_item.id
    };
    $http({
      method: 'POST',
      url: API_URL + 'tolerances',
      data: $.param(params),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(data){
      console.log(data);
      $scope.errors = {};
      $scope.cur_item.max = $scope.cur_max_val;
      $scope.cur_item.min = $scope.cur_min_val;
      $scope.cur_item.id = data;
    }).error(function(data, status){
      console.error(data);
      $scope.errors = data;
    });
  };

  $scope.fieldBySystem = function(text){
    return ($scope.cur_system == 'hole')? text.toUpperCase(): text;
  };

  $scope.toleranceToFloat = function(tolerance){
    tolerance.max = tolerance.max ? parseFloat(tolerance.max) : null;
    tolerance.min = tolerance.min ? parseFloat(tolerance.min) : null;
  };

  function getItems(items) {
    var res = [];
    angular.forEach(items, function(item, key){
      new_item = angular.copy(item);
      delete new_item['systems'];
      delete new_item['qualities'];
      delete new_item['fields'];
      delete new_item['tolerance'];
      res.push(new_item);
    });
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
          name: item['title'],
          item: item
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
