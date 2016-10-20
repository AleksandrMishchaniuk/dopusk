@extends('admin.tolerance.layout')

@section('field_content')
  <div ng-app="ToleranceApp">
    <div ng-controller="ToleranceAppCtrl"  ng-cloak>
      <div class="col-md-1">
        <div class="form-group" ng-repeat="system in systems">
          <input type="radio" name="system"
                              id="system_@{{ system }}"
                              value="@{{ system }}"
                              ng-model="$parent.cur_system"
                              ng-click="refreshGrid()">
          <label for="system_@{{ system }}">
            @{{ (system == 'hole')? 'Отв.': 'Вал' }}
          </label>
        </div>
        <hr>
        <div ng-repeat="range in ranges">
          <input type="radio" name="range"
                              id="range_@{{ range }}"
                              value="@{{ range }}"
                              ng-model="$parent.cur_range"
                              ng-click="refreshGrid()">
          <label for="range_@{{ range }}">
            @{{ range.replace('_', '-') }}
          </label>
        </div>
      </div>
      <div class="col-md-10">
        <table class="table table-bordered">
          <tr>
            <td></td>
            <td ng-repeat="field in fields">
              @{{ fieldBySystem(field) }}
            </td>
          </tr>
          <tr ng-repeat="quality in grid | orderQualities">
            <td>@{{ quality['name'] }}</td>
            <td ng-repeat="(field_name, item) in quality['fields']"
                ng-click="editField(item, field_name, quality['name'])"
                ng-class="{selected: item == cur_item}">
              <div>@{{ item['max'] }}</div>
              <div>@{{ item['min'] }}</div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-1">
        <div class="text-center">
          @{{ fieldBySystem(cur_field_name) + cur_quality_name }}
        </div>
        <div class="form-group">
          max:
          <input type="text" ng-model="cur_max_val" class="form-control">
        </div>
        <div class="form-group">
          min:
          <input type="text" ng-model="cur_min_val" class="form-control">
        </div>
        <div class="form-group">
          <button type="button" ng-click="updateField()" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
@stop

@section('template_styles')
  <style>
    [ng-cloak]{
      display: none;
    }
    .selected{
      background-color: orange;
    }
  </style>
@stop
