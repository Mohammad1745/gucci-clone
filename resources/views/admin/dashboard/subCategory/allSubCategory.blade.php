@extends('admin.layouts.admin')
@section('title')
    All SubCategory
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#"> <b>ALL SUB CATEGORY </b> </a>
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
        <a href="{{route('addSubCategory')}}" class="btn btn-primary">Add Products</a>
      </span>
            </div>
        </div>
    </nav>
    <div style="padding: 2vw;justify-content: center">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>SubCategory Name</th>
                <th>Category</th>
                <th>product</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($SubCategories as $SubCategory)
                <tr>

                    <td>{{$SubCategory->id}}</td>
                    <td>{{$SubCategory->subCategory_name}}</td>
                    <td>{{$SubCategory->category_name}}</td>
                    <td>{{$SubCategory->product_count}}</td>
                    <td><a class="btn btn-primary" href="{{route('editSubCategory',$SubCategory->id)}}">Edit</a>
                        <form action="{{route('deleteSubCategory',$SubCategory->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this subCategory?')">
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
