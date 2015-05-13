@extends('layout')
@section('titulo') Registro @stop


@section('content')

    {{ HTML::link('/', 'volver'); }}
    <h1>Crear Usuario</h1>
    {{ Form::open(array('url' => '/registro')) }}

    {{ Form::label('correo', 'Email') }}
    {{ Form::email('correo') }}
    <br>
    {{Form::label('password', 'Contraseña')}}
    {{Form::text('password', '')}}

    Esto solo se ve en pruebas
    <br/>
    {{Form::label('rol', 'Rol')}}
    {{Form::select('rol', array('Admin' => 'Admin', 'Usuario' => 'Usuario')) }}
    <br>
    {{Form::submit('Registrar usuario')}}
    {{ Form::close() }}

@stop