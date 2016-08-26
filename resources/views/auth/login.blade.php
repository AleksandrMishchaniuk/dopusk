@extends('layouts.default')

@section('content')
    <div class='container'>
        <h1>Login Page</h1>
        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('email', 'E-mail address') !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop