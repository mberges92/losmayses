@extends('layout')
@section('titulo') Login @stop


@section('content')

    @if(Auth::check() && Auth::user()->rol == "Admin")

        {{  HTML::link('/post/nuevo', 'NUEVO POST') }}
        <br/>
        {{  HTML::link('/admin', 'ADMINISTRACION')  }}
    @elseif(Auth::check())
        {{  HTML::link('/post/nuevo', 'NUEVO POST')  }}
    @else
        {{ HTML::link('/registro', 'REGISTRAR NUEVO USUARIO') }}
        <br/>
        {{ HTML::link('/login', 'LOGIN') }}
    @endif
    <hr/>



@stop