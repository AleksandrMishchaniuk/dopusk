@extends('admin.tolerance.layout')

@section('field_content')
  <div ng-app="ToleranceApp">
    <div ng-controller="ToleranceAppCtrl"  ng-cloak>

      <div class="row well">
        <div class="col-md-2 text-center">
          @{{ fieldBySystem(cur_field_name) + cur_quality_name }}
        </div>
        <div class="col-md-8">
          <form class="form-inline" method="POST" role="form"
                name="tolerance_form" novalidate="novalidate"
                ng-submit="updateField()"
          >
            <fieldset ng-disabled="!cur_item">
                <div class="form-group{{ $errors->has('max_val') ? ' has-error' : '' }}">
                  <small class="text-primary">
                    @{{ prev_range_tolerance.max_val }}
                  </small>
                  <br>
                    {!! Form::label('max_val', 'Max') !!}
                    {!! Form::number('max_val', null, [
                      'class' => 'form-control',
                      'ng-model' => 'cur_max_val',
                      'focus' => 'cur_max_val_focus',
                      'min' => '@{{ min_input_val }}',
                      'ng-keyup' => 'keyupHandler($event)',
                      'ng-change' => 'toleranceChangeHandler(\'max\')',
                    ]) !!}
                    <br>
                    <small class="text-danger">
                      {{ $errors->first('max_val') }}
                      @{{ errors.max_val[0] }}
                    </small>
                </div>

                <div class="form-group{{ $errors->has('min_val') ? ' has-error' : '' }}">
                  <small class="text-primary">
                    @{{ prev_range_tolerance.min_val }}
                  </small>
                  <br>
                    {!! Form::label('min_val', 'Min') !!}
                    {!! Form::number('min_val', null, [
                      'class' => 'form-control',
                      'ng-model' => 'cur_min_val',
                      'max' => '@{{ cur_max_val }}',
                      'ng-keyup' => 'keyupHandler($event)',
                      'ng-change' => 'toleranceChangeHandler(\'min\')',
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
        <div class="col-md-2">
          <label>Поле</label>
          <input type="number" ng-model="delta" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-md-10">
          <table class="table table-bordered" tabindex="0" cell-cursor="cursor" ng-keyup="keyupHandler($event)">
            <tr>
              <td></td>
              <td ng-repeat="field in fields">
                @{{ fieldBySystem(field.title) }}
              </td>
            </tr>
            <tr ng-repeat="(q, quality) in qualities">
              <td>@{{ quality.title }}</td>
              <td ng-repeat="(f, field) in fields"
                  ng-click="editItem(field, quality, f, q)"
                  ng-class="{selected: grid[field.id][quality.id] == cur_item}"
                  class="tolerance_cell">
                <div class="tolerance_val">@{{ grid[field.id][quality.id]['max_val'] }}</div>
                <div class="tolerance_val">@{{ grid[field.id][quality.id]['min_val'] }}</div>
              </td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <div class="form-group" ng-repeat="system in systems">
            <input type="radio" name="system"
                                id="system_@{{ system.title }}"
                                value="@{{ system.title }}"
                                ng-model="$parent.cur_system"/>
            <label for="system_@{{ system.title }}">
              @{{ (system.title == 'hole')? 'Отв.': 'Вал' }}
            </label>
          </div>
          <hr>
          <div ng-repeat="(r, range) in ranges">
            <input type="radio" name="range"
                                id="range_@{{ range.id }}"
                                ng-value="range.id"
                                ng-model="$parent.cur_range"
                                ng-change="rangeChangedHandler(r, range)"/>
            <label for="range_@{{ range.id }}">
              @{{ range.min }} - @{{ range.max }}
            </label>
          </div>
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
    .tolerance_val{
      height: 18px;
      text-align: center;
    }
    .table > tbody > tr > td.tolerance_cell{
      padding: 2px;
    }
  </style>
@stop
