@extends('admin.layouts.admin')
@section('title')
    Add Category
@endsection
@section('content')

    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <link rel="stylesheet" href="/css/mdb.min.css" />
    <form>
        <!-- 2 column grid layout with text inputs for the first and last names -->
                <div>
                    <h5>Add Category</h5>
                </div>
                <div class="form-outline mb-4 col-6">
                    <input type="text" id="form6Example1" class="form-control"  />
                    <label class="form-label" for="form6Example1">Name</label>
                </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary ">Add</button>
    </form>
    </div>
@endsection
