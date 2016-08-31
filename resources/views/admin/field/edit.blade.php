@extends('admin.field.layout')

@section('field_content')
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h2>Редактирование диапазона</h2>
      <?php
        $form_data = [
          'route' => ['admin.fields.update', 'fields'=>$field],
          'method' => 'PATCH',
          'model' => $field,
        ];
      ?>
      @include('admin.field._form')
    </div>
  </div>
@endsection
