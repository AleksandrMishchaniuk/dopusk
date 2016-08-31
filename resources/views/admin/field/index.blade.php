@extends('admin.field.layout')

@section('field_content')
  <div class="buttons">
      {!! link_to_route('admin.fields.create', 'Создать новый квалитет', [], ['class'=>'btn btn-primary']) !!}
  </div>
  <hr>
  @if($fields->count())
    <div class="list table">
        <table class="table">
          <thead>
            <tr>
              <th>Значение</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($fields as $field)
              <tr>
                <td>{{ $field->value }}</td>
                <td>
                  {!! link_to_route('admin.fields.edit', 'Редактировать', ['fields'=>$field], ['class'=>'btn btn-primary']) !!}
                  {!! Form::submit('Удалить', ['class' => 'btn btn-danger delete_btn', 'form'=>"field_field_{$field->id}"]) !!}
                  {!! Form::model($field, ['route' => ['admin.fields.destroy', $field->id], 'method' => 'DELETE', 'id'=>"field_field_{$field->id}"]) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  @endif
  <script type="text/javascript">
  $(document).ready(function(){
    $('.delete_btn').click(function(){
      return confirm('Вы действительно хотите удалить эту запись?');
    });
  });
  </script>
@stop
