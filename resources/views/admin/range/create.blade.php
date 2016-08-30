@extends('admin.range.layout')

@section('range_content')
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h2>Создание диапазона</h2>
      <?php
        $form_data = [
          'route' => 'admin.ranges.store',
          'method' => 'POST',
          'model' => $range,
        ];
      ?>
      @include('admin.range._form')
    </div>
  </div>
@endsection
