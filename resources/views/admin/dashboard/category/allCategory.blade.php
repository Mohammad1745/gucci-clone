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
            @foreach($categories as $category)
                <tr>

                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->subCategoryCount}}</td>
                    <td>{{$category->productCount}}</td>
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
