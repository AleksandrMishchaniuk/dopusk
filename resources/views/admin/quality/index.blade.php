@extends('admin.quality.layout')

@section('quality_content')
  <div class="buttons">
      {!! link_to_route('admin.qualities.create', 'Создать новый квалитет', [], ['class'=>'btn btn-primary']) !!}
  </div>
  <hr>
  @if($qualities->count())
    <div class="list table">
        <table class="table">
          <thead>
            <tr>
              <th>Значение</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($qualities as $quality)
              <tr>
                <td>{{ $quality->value }}</td>
                <td>
                  {!! link_to_route('admin.qualities.edit', 'Редактировать', ['qualities'=>$quality], ['class'=>'btn btn-primary']) !!}
                  {!! Form::submit('Удалить', ['class' => 'btn btn-danger delete_btn', 'form'=>"quality_field_{$quality->id}"]) !!}
                  {!! Form::model($quality, ['route' => ['admin.qualities.destroy', $quality->id], 'method' => 'DELETE', 'id'=>"quality_field_{$quality->id}"]) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  @endif
@stop

@section('template_scripts')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.delete_btn').click(function(){
      return confirm('Вы действительно хотите удалить эту запись?');
    });
  });
  </script>
@stop
