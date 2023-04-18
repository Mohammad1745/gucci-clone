@extends('admin.layouts.admin')
@section('title')
    Add Category
@endsection
@section('content')

    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <link rel="stylesheet" href="/css/mdb.min.css" />
    <form action="{{route('storeCategory')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
                <div>
                    <h5>Add Category</h5>
                </div>
                <div class="form-outline mb-4 col-6">
                    <input name="name" type="text" id="form6Example1" class="form-control"  />
                    <label class="form-label" for="form6Example1">Name</label>
                </div>
        @if (isset($errors) && $errors->has('name'))
            <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif

        <div class="form-outline mb-4">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required accept="image/*">
            @if (isset($errors) && $errors->has('image'))
                <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
            @endif
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary ">Add</button>
    </form>
    </div>
@endsection
