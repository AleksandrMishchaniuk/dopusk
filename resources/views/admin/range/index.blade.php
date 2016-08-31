@extends('admin.range.layout')

@section('range_content')
  <div class="buttons">
      {!! link_to_route('admin.ranges.create', 'Создать новый диапазон', [], ['class'=>'btn btn-primary']) !!}
  </div>
  <hr>
  @if($ranges->count())
    <div class="list table">
        <table class="table">
          <thead>
            <tr>
              <th>Минимум (вкл.)</th>
              <th>Максимум (не вкл.)</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($ranges as $range)
              <tr>
                <td>{{ $range->min_val }} мм</td>
                <td>{{ $range->max_val }} мм</td>
                <td>
                  {!! link_to_route('admin.ranges.edit', 'Редактировать', ['ranges'=>$range], ['class'=>'btn btn-primary']) !!}
                  {!! Form::submit('Удалить', ['class' => 'btn btn-danger delete_btn', 'form'=>"range_field_{$range->id}"]) !!}
                  {!! Form::model($range, ['route' => ['admin.ranges.destroy', $range->id], 'method' => 'DELETE', 'id'=>"range_field_{$range->id}"]) !!}
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
