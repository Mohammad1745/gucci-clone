@extends('admin.layouts.admin')
@section('title')
    Current Order
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#"> <b>Current Order </b> </a>
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"/>
                <span class="navbar-text">
        <a href="{{route('completedOrder')}}" class="btn btn-primary">Completed Order</a>
      </span>
            </div>
        </div>
    </nav>
    <div style="padding: 2vw;">
        <table class="table table-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Place</th>
                <th>Order Details</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->number}}</td>
                    <td>{{$order->village_name}}</td>
                    <td><a class="btn btn-light">Details</a></td>
                    <td><a class="btn btn-info">completed</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
