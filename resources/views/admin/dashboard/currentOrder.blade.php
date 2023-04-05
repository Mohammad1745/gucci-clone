@extends('admin.layouts.admin')
@section('title')
    Current Order
@endsection
@section('content')

    <div style="padding: 5vw; justify-content: center">
        <div>
            <h5>Current Order</h5>
        </div>
        <table class="table table-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Place</th>
                <th>Order Details</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Md Tamim Hossain</td>
                <td>Dhaka Bangladesh</td>
                <td><a class="btn btn-light">Details</a></td>
                <td><a class="btn btn-primary">completed</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
