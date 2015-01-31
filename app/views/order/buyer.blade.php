@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <h3>  Order </h3>
    <hr class="soft"/>

    </table>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Created At</th>
            <th>Total Amount</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>

                <!-- cart image thumbs will go under the img bellow -->

                <td>
                    {{$order->id}}
                </td>
                <td>
                    {{$order->created_at->toFormattedDateString()}}
                </td>


                <td>{{$order->total_price}}</td>
                @if($order->status==0)
                    <td>Pending</td>
                @elseif($order->status==1)
                    <td>Delivered</td>
                @elseif($order->status==2)
                    <td>Cancelled</td>
                @endif



            </tr>
        @endforeach




        </tbody>
    </table>

@stop