@extends('admin.layouts.admin')
@section('title')
    Add Category
@endsection
@section('content')

    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <link rel="stylesheet" href="/css/mdb.min.css" />
    <form action="{{route('updateCategory')}}" method="post">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
                <div>
                    <h5>Edit Category</h5>
                </div>
                <input name="id" type="hidden" value="{{$category->id}}">
                <div class="form-outline mb-4 col-6">
                    <input name="name" type="text" id="form6Example1" class="form-control" value="{{$category->name}}" />
                    <label class="form-label" for="form6Example1">Name</label>
                </div>
        @if (isset($errors) && $errors->has('name'))
            <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary ">Update</button>
    </form>
    </div>
@endsection
