@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{Form::open(['route'=>'products.store', 'method'=> 'post','role'=>'form'])}}
    <fieldset>


        <div class="form-group">

            {{Form::label('name','Product Name',['class'=>'control-label'])}}
            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Product Name')) }}
        </div>

        <div class="form-group">

            {{Form::label('price','Price',['class'=>'control-label'])}}
            {{ Form::number('price', '', array('class' => 'form-control', 'placeholder' => 'Product Price')) }}
        </div>

        <div class="form-group">

            {{Form::label('quantity','Quantity',['class'=>'control-label'])}}
            {{ Form::number('quantity', '', array('class' => 'form-control', 'placeholder' => 'Product Quantity')) }}
        </div>


        <div class="form-group">

            {{Form::label('description','Product Description',['class'=>'control-label'])}}
            {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'Product Description')) }}
        </div>

        <div class="form-group">

            {{Form::label('category_id','Product Category',['class'=>'control-label'])}}
            {{ Form::select('category_id', $category, array('class' => 'form-control')) }}
        </div>






        <!-- Change this to a button or input when using this as a form -->
        {{Form::submit('Add Product',['class'=> 'btn'])}}

    </fieldset>
    {{Form::close()}}


@stop

@section('style')
    {{ HTML::style('css/chosen_dropdown/chosen.css') }}

@stop

@section('script')
    {{ HTML::script('js/chosen_dropdown/chosen.jquery.min.js') }}
    {{ HTML::script('js/chosen_dropdown/chosen.proto.min.js') }}


    <script type="text/javascript">
        $(document).ready(function(){
            $(".multi_dropdown").chosen();


        });
    </script>
@stop