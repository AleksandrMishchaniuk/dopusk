@extends('layouts.front')

@section('content')
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <h1 class="text-center">Registration Page</h1>
      <hr>
      {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::label('email', 'Email address') !!}
              {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
              <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password') !!}
              {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {!! Form::label('password_confirmation', 'Password confirmation') !!}
              {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
          </div>
          <div class="form-group">
              {!! Form::submit("Sign Up", ['class' => 'btn btn-success']) !!}
          </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
