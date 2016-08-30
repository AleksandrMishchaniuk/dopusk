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
                  {!! link_to_route('admin.ranges.destroy', 'Удалить', ['ranges'=>$range], ['class'=>'btn btn-danger']) !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  @endif
@stop
