@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{route('image.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="name"  name='product_name'>
                      @error('product_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Product Price</label>
                      <input type="text" class="form-control" id="price"  name='product_price'>
                      @error('product_price')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Product Image</label>
                      <input type="file" class="form-control" id="image"  name='product_image'>
                      @error('product_image')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection