@extends('layouts.admin')
<?php $nav_page = 'tolerances' ?>

@section('content')
  <h1>Допуски</h1>
  <hr>
  @yield('field_content')
@stop

@section('template_scripts')
  {!! Html::script('js/pages/admin/tolerance.js') !!}
@stop
