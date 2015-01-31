@extends('layouts.default')

@section('content')
    @include('includes.alert')
    @if(Entrust::hasrole(Config::get('globalRole.seller')))
    <a class="btn btn-large btn-success" href="{{route('products.create')}}">Add Product</a>


    @endif

    @if(Entrust::hasrole(Config::get('globalRole.buyer')))
        <a class="btn btn-large btn-success" href="{{route('order.view')}}">All My Orders</a>
        <a class="btn btn-large btn-info" href="{{route('cart.show')}}">My Cart</a>


    @endif
@stop