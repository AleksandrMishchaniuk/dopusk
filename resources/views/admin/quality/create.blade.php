@extends('admin.quality.layout')

@section('quality_content')
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h2>Создание диапазона</h2>
      <?php
        $form_data = [
          'route' => 'admin.qualities.store',
          'method' => 'POST',
          'model' => $quality,
        ];
      ?>
      @include('admin.quality._form')
    </div>
  </div>
@endsection
