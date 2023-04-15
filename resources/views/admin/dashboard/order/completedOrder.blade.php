@extends('admin.layouts.admin')
@section('title')
    Completed Order
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#"> <b>Completed Order </b> </a>
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
        <a href="{{route('currentOrder')}}" class="btn btn-info">Current Order</a>
      </span>
            </div>
        </div>
    </nav>
    <div style="padding: 2vw;">
        <table class="table table-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Place</th>
                <th>Customer Feedback</th>
                <th>Order Details</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Md Tamim Hossain</td>
                <td>Dhaka Bangladesh</td>
                <td>4.5/5</td>
                <td><a class="btn btn-info">Details</a></td>
                <td>Completed</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
