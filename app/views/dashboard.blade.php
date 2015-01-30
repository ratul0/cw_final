@extends('layouts.default')

@section('content')
    @include('includes.alert')
	This is Dashboard.
    @if(Entrust::hasrole(Config::get('globalRole.seller')))
    <a href="{{route('products.create')}}">Add Product</a>
    @endif
@stop