@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{Form::open(['route'=>'doRegister', 'method'=> 'post','role'=>'form'])}}
    <fieldset>

        <div class="form-group">
            {{ Form::text('full_name', '', array('class' => 'form-control', 'placeholder' => 'Full Name')) }}
        </div>



        <div class="form-group">
            {{Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail'])}}
        </div>

        <div class="form-group">
            {{ Form::text('mobile', '', array('class' => 'form-control', 'placeholder' => 'Mobile')) }}
        </div>

        <div class="form-group">
            {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
        </div>

        <div class="form-group">
            {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
        </div>

        <div class="form-group">
            {{ Form::select('user_type',[1=>Config::get('globalRole.buyer'),2=>Config::get('globalRole.seller')],'',['class'=>'form-control']) }}
        </div>

        <!-- Change this to a button or input when using this as a form -->
        {{Form::submit('Register',['class'=> 'btn'])}}

    </fieldset>
    {{Form::close()}}
    <div id="tabs" data-tabs="tabs">
        <p class="text-center"><a class="btn" href="{{route('login')}}">Already Have an Account?</a></p>
    </div>

    </div>

   

@stop
