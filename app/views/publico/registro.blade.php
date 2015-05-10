@extends('layout')
@section('titulo') Registro @stop


@section('content')

    {{ HTML::link('/', 'volver'); }}
    <h1>Crear Usuario</h1>
    {{ Form::open(array('url' => '/registro')) }}

    {{Form::label('username', 'Usuario')}}
    {{Form::text('username', '')}}
    <br>
    {{Form::label('password', 'Contraseña')}}
    {{Form::text('password', '')}}
    <br>
    {{ Form::label('correo', 'Email') }}
    {{ Form::email('correo') }}
    <br/>
    {{Form::label('rol', 'Rol')}}
    {{Form::select('rol', array('Admin' => 'Admin', 'Usuario' => 'Usuario')) }}
    <br>
    {{Form::submit('Registrar usuario')}}
    {{ Form::close() }}

@stop