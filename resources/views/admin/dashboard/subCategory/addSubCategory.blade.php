@extends('admin.layouts.admin')
@section('title')
    Subcategory
@endsection
@section('content')
<style>
    .form-select{

    }
</style>
    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <div>
            <h3 class="text-primary">Add subcategory</h3>
        </div>
        <form method="post"  action="{{route('storeSubcategory')}}" class="col-md-6 col-lg-6">

                @csrf
              <br/>
                    <div class="form-outline ">
                        <input type="text" id="form6Example1" name="name" class="form-control"  />
                        <label class="form-label" for="form6Example1">Name</label>
                    </div>

                <br/>
              <br/>
                <select class="form-select " name="category_id" aria-label="Default select example">
                    <option value="category_id">select Category</option>
                    @foreach($categories as $category)
                    <option name="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
               <br/>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary ">Add subcategory</button>
        </form>
    </div>
@endsection
