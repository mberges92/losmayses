@extends('layout')
@section('titulo') Login @stop


@section('content')
    <div class="panel-body">
        <form method="POST" action="login" accept-charset="UTF-8" role="form" class="form-signin">
            <fieldset>
                <label class="panel-login">
                    <div class="login_result"></div>
                </label>
                <input class="form-control" name="email" placeholder="Email" id="email" type="mail">
                <input class="form-control" placeholder="Password" name="pwd" id="password" type="password">
                <br></br>
                <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
            </fieldset>
        </form>
    </div>
@stop
