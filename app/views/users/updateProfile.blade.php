@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{Form::open(['route'=>'user.updateProfile', 'method'=> 'put','role'=>'form'])}}
    <fieldset>

        <div class="form-group">
            {{ Form::text('full_name', $user->full_name, array('class' => 'form-control', 'placeholder' => 'Full Name')) }}
        </div>

        <div class="form-group">
            {{ Form::text('mobile', $user->mobile, array('class' => 'form-control', 'placeholder' => 'Mobile')) }}
        </div>

        {{Form::submit('Update',['class'=> 'btn'])}}

    </fieldset>
    {{Form::close()}}


    </div>



@stop

