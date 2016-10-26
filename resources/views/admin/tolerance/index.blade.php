@extends('admin.tolerance.layout')

@section('field_content')
  <div ng-app="ToleranceApp">
    <div ng-controller="ToleranceAppCtrl"  ng-cloak>
      <div class="col-md-1">
        <div class="form-group" ng-repeat="system in systems">
          <input type="radio" name="system"
                              id="system_@{{ system['title'] }}"
                              value="@{{ system['title'] }}"
                              ng-model="$parent.cur_system"
                              ng-click="refreshGrid()">
          <label for="system_@{{ system['title'] }}">
            @{{ (system['title'] == 'hole')? 'Отв.': 'Вал' }}
          </label>
        </div>
        <hr>
        <div ng-repeat="range in ranges">
          <input type="radio" name="range"
                              id="range_@{{ range['id'] }}"
                              value="@{{ range['id'] }}"
                              ng-model="$parent.cur_range"
                              ng-click="refreshGrid()">
          <label for="range_@{{ range['id'] }}">
            @{{ range['min'] }} - @{{ range['max'] }}
          </label>
        </div>
      </div>
      <div class="col-md-10">
        <table class="table table-bordered">
          <tr>
            <td></td>
            <td ng-repeat="field in fields">
              @{{ fieldBySystem(field['title']) }}
            </td>
          </tr>
          <tr ng-repeat="quality in grid | orderQualities">
            <td>@{{ quality.item.title }}</td>
            <td ng-repeat="field in quality.item.fields"
                ng-click="editField(field, quality.item)"
                ng-class="{selected: field.tolerance == cur_item}">
              <div>@{{ field.tolerance.max }}</div>
              <div>@{{ field.tolerance.min }}</div>
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
