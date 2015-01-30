@extends('layouts.default')

@section('content')
    @include('includes.alert')

    {{Form::open(['route'=>'doLogin', 'method'=> 'post','role'=>'form'])}}
    <div class="control-group">
        <label class="control-label" for="inputEmail1">Email</label>

        <div class="controls">

            {{Form::email('email',null,['class'=>'span3','placeholder'=>'E-mail'])}}
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword1">Password</label>

        <div class="controls">

            {{Form::password('password',['class'=>'span3','placeholder'=>'Password'])}}
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            {{Form::submit('Login',['class'=> 'btn'])}}

        </div>
    </div>

    {{Form::close()}}
    <div id="tabs" data-tabs="tabs">
        <p class="text-center"><a class="btn" href="{{route('register')}}">Need an Account?</a></p>
    </div>
@stop




