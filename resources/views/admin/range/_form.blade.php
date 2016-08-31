{!! Form::model($form_data['model'], ['route' => $form_data['route'], 'method' => $form_data['method']]) !!}

    <div class="form-group{{ $errors->has('min_val') ? ' has-error' : '' }}">
        {!! Form::label('min_val', 'Минимальный размер') !!}
        {!! Form::number('min_val', $form_data['model']->min_val, ['class' => 'form-control', 'required' => 'required', 'min'=>0, 'step'=>1, 'autofocus']) !!}
        <small class="text-danger">{{ $errors->first('min_val') }}</small>
    </div>

    <div class="form-group{{ $errors->has('max_val') ? ' has-error' : '' }}">
        {!! Form::label('max_val', 'Максимальный размер') !!}
        {!! Form::number('max_val', $form_data['model']->max_val, ['class' => 'form-control', 'required' => 'required', 'min'=>0, 'step'=>1]) !!}
        <small class="text-danger">{{ $errors->first('max_val') }}</small>
    </div>

    <div class="form-group">
        {!! link_to_route('admin.ranges.index', 'Отмена', [], ['class'=>'btn btn-default']) !!}
        {!! Form::reset("Сбросить", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Сохранить", ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}
