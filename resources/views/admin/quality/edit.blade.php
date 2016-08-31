@extends('admin.quality.layout')

@section('quality_content')
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h2>Редактирование диапазона</h2>
      <?php
        $form_data = [
          'route' => ['admin.qualities.update', 'qualities'=>$quality],
          'method' => 'PATCH',
          'model' => $quality,
        ];
      ?>
      @include('admin.quality._form')
    </div>
  </div>
@endsection
