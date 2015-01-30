
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





{{--@include('includes.header')--}}

{{--<body>--}}
{{--<div class="container">--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4">--}}
            {{--<div class="login-panel panel panel-default">--}}

                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Please Sign In</h3>--}}
                {{--</div>--}}
                {{--@include('includes.alert')--}}

                {{--<div class="panel-body">--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@include('includes.footer')--}}


{{--</body>--}}

{{--</html>--}}
