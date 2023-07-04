@extends('customer.layouts.customerProfile')

    @section('profile content')
        <h1>History</h1>
        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            @foreach($completedOrder as $order)
                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->total_price}}</td>
                    <td><a class="btn btn-success" >Received</a></td>
                </tr>
            @endforeach

        </table>

    @endsection

