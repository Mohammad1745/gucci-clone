@extends('customer.layouts.customerProfile')

    @section('profile content')
        <h1>Pending Order</h1>
        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
            @foreach($pending_orders as $order)
                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->total_price}}</td>
                </tr>
            @endforeach

        </table>

    @endsection

