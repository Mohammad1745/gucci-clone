@extends('customer.layouts.customer')
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <div class="col-12" style="padding-top: 20px;">
        <div class="row">
            <div class="col-12">
                <div class="box_main">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $totalprice= 0;
                            @endphp
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{$cart->product_name}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->price}}</td>
                                    <td>
                                        <form action="{{route('removeCard',$cart->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $totalprice= $totalprice+$cart->price;
                                @endphp

                            @endforeach
                            <tr>
                                <td class="">Total</td>
                                <td class=" text-right">{{$totalprice}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
