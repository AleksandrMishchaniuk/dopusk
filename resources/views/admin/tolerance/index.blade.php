@extends('admin.tolerance.layout')

@section('field_content')
  <div ng-app="ToleranceApp">
    <div ng-controller="ToleranceAppCtrl"  ng-cloak>

      <div class="row well">
        <div class="col-md-2 text-center">
          @{{ fieldBySystem(cur_field_name) + cur_quality_name }}
        </div>
        <div class="col-md-10">
          <form class="form-inline" method="POST" role="form"
                name="tolerance_form" novalidate="novalidate"
                ng-submit="updateField()"
          >
            <fieldset ng-disabled="!cur_item">
                <div class="form-group{{ $errors->has('max_val') ? ' has-error' : '' }}">
                    {!! Form::label('max_val', 'Max') !!}
                    {!! Form::number('max_val', null, [
                      'class' => 'form-control',
                      'ng-model' => 'cur_max_val',
                      'min' => '@{{ cur_min_val + 0.001 }}',
                    ]) !!}
                    <br>
                    <small class="text-danger">
                      {{ $errors->first('max_val') }}
                      @{{ errors.max_val[0] }}
                    </small>
                </div>

                <div class="form-group{{ $errors->has('min_val') ? ' has-error' : '' }}">
                    {!! Form::label('min_val', 'Min') !!}
                    {!! Form::number('min_val', null, [
                      'class' => 'form-control',
                      'ng-model' => 'cur_min_val',
                      'max' => '@{{ cur_max_val }}',
                    ]) !!}
                    <br>
                    <small class="text-danger">
                      {{ $errors->first('min_val') }}
                      @{{ errors.min_val[0] }}
                    </small>
                </div>

                <div class="btn-group">
                    {!! Form::submit("Save", [
                      'class' => 'btn btn-success',
                      'ng-disabled' => 'tolerance_form.$invalid'
                    ]) !!}
                </div>
            </fieldset>
          {!! Form::close() !!}
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
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
                @{{ toleranceToFloat(field.tolerance) }}
                <div>@{{ field.tolerance.max }}</div>
                <div>@{{ field.tolerance.min }}</div>
              </td>
            </tr>
          </table>
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
