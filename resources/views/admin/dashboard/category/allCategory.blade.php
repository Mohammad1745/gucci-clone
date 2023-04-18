@extends('admin.layouts.admin')
@section('title')
    All Category
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#"> <b>ALL CATEGORY </b> </a>
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
        <a href="{{route('showAddCategory')}}" class="btn btn-info">Add Category</a>
      </span>
            </div>
        </div>
    </nav>
    <div style="padding: 2vw;">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>product</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>

                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->subcategory_count}}</td>
                    <td>{{$category->product_count}}</td>
                    <td><a class="btn btn-primary" href="{{route('editCategory',$category->id)}}">Edit</a>
                        <form action="{{route('deleteCategory',$category->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this Category?')">
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
