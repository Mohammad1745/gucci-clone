@extends('admin.layouts.admin')
@section('title')
    All Category
@endsection
@section('content')

    <div style="padding: 5vw; justify-content: center">
        <div>
            <h5>All Category</h5>
        </div>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>SubCategory</th>
                <th>product</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Category</td>
                <td>10</td>
                <td>100</td>
                <td><a class="btn btn-primary">Edit</a><a class="btn btn-danger">Delete</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
