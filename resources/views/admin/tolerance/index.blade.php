@extends('admin.tolerance.layout')

@section('field_content')
  <div ng-app="ToleranceApp">
    <div ng-controller="ToleranceAppCtrl"  ng-cloak>
      <div class="col-md-1">

      </div>
      <div class="col-md-10">
        <table class="table table-bordered">
          <tr>
            <td></td>
            <td ng-repeat="field in fields">
              @{{ field }}
            </td>
          </tr>
          <tr ng-repeat="quality in grid | orderQualities">
            <td ng-bind="quality['name']"></td>
            <td ng-repeat="field in quality['fields']">
              <div ng-bind="field['max']"></div>
              <div ng-bind="field['min']"></div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-1">

      </div>
    </div>
  </div>
@stop

@section('template_styles')
  <style>
    [ng-cloak]{
      display: none;
    }
  </style>
@stop
