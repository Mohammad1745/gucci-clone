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
        <form class="col-md-6 col-lg-6 ">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div>
                <h3 class="text-primary">Add subCategory</h3>
            </div>
              <br/>
                    <div class="form-outline ">
                        <input type="text" id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">Name</label>
                    </div>

                <br/>
            <!-- Text input -->
            <div class="form-outline">
                <input type="text" id="form6Example3" class="form-control" />
                <label class="form-label" for="form6Example3">Slug</label>
            </div>
              <br/>
                <select class="form-select " aria-label="Default select example">
                    <option selected>select Category</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
               <br/>
            <!-- Message input -->
            <div class="form-outline">
                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Description</label>
            </div>
              <br/>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary ">Add subCategory</button>
        </form>
    </div>
@endsection
