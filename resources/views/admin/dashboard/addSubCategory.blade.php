@extends('admin.layouts.admin')
@section('title')
    SubCategory
@endsection
@section('content')
<style>
    .form-select{

    }
</style>
    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
    <form>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div>
            <h5>Add subCategory</h5>
        </div>
                <div class="form-outline mb-4 col-6">
                    <input type="text" id="form6Example1" class="form-control"  />
                    <label class="form-label" for="form6Example1">Name</label>
                </div>


        <!-- Text input -->
        <div class="form-outline mb-4 col-6">
            <input type="text" id="form6Example3" class="form-control" />
            <label class="form-label" for="form6Example3">Slug</label>
        </div>
            <select class="form-select mb-4 col-6" aria-label="Default select example">
                <option selected>select Category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

        <!-- Message input -->
        <div class="form-outline mb-4 col-6">
            <textarea class="form-control" id="form6Example7" rows="4"></textarea>
            <label class="form-label" for="form6Example7">Description</label>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary ">Add</button>
    </form>
    </div>
@endsection
