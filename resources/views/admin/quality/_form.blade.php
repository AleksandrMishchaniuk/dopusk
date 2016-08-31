{!! Form::model($form_data['model'], ['route' => $form_data['route'], 'method' => $form_data['method']]) !!}

    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        {!! Form::label('value', 'Минимальный размер') !!}
        {!! Form::text('value', $form_data['model']->value, ['class' => 'form-control', 'required' => 'required', 'maxlength'=>'2', 'autofocus']) !!}
        <small class="text-danger">{{ $errors->first('value') }}</small>
    </div>

    <div class="form-group">
        {!! link_to_route('admin.qualities.index', 'Отмена', [], ['class'=>'btn btn-default']) !!}
        {!! Form::reset("Сбросить", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Сохранить", ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}
