@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{Form::open(['route'=>'products.store', 'method'=> 'post','role'=>'form', 'files' => true])}}
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
            <select class="form-control" name="category_id" id="category_id">
                <option value="0">Select Category</option>
                @foreach($category as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            {{--{{ Form::select('category_id', $category, array('class' => 'form-control','id' => 'category_id')) }}--}}
        </div>
        <div class="form-group">

            {{Form::label('sub_category_id','Product SubCategory',['class'=>'control-label'])}}
            {{ Form::select('sub_category_id' ,[], array('class' => 'form-control','id' => 'sub_category_id')) }}
        </div>
        <div id="fields">

        </div>
        <div class="form-group">

            {{Form::label('image1','Image #1',['class'=>'control-label'])}}
            {{ Form::file('image1', '', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">

            {{Form::label('image2','Image #2',['class'=>'control-label'])}}
            {{ Form::file('image2', '', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">

            {{Form::label('image3','Image #3',['class'=>'control-label'])}}
            {{ Form::file('image3', '', array('class' => 'form-control')) }}
        </div>







        <!-- Change this to a button or input when using this as a form -->
        {{Form::submit('Add Product',['class'=> 'btn','id'=>'submit'])}}

    </fieldset>
    {{Form::close()}}


@stop


@section('script')


    <script type="text/javascript">
        $(document).ready(function(){

            $('#category_id').change(function(){
                var cat_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url:"{{route('products.category.subcategory')}}",
                    data: { id: cat_id},
                    success:function(msg){
                        //console.log(msg);
                        $('#sub_category_id').html(msg);
                        $('#fields').html('');

                        //alert(msg);
                    },
                    error:function(msg){
                        console.log(msg);
                    }
                });
            });
            $('#sub_category_id').change(function(){
                var sub_cat_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url:"{{route('products.category.subcategory.fields')}}",
                    data: { id: sub_cat_id},
                    success:function(msg){
                        console.log(msg);
                        $('#fields').html(msg);
                        //alert(msg);
                    },
                    error:function(msg){
                        console.log(msg);
                    }
                });
            });
        });
    </script>
@stop