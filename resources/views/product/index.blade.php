@extends('layouts.master')
@section('content')
    <div class="container">
        <a class="btn btn-primary mt-3 mb-3" href="{{route('image.create')}}">Add Product</a>
        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>
                                    <img src="{{url('/uploads', $product->product_image)}}" alt="Product image" width="80">
                                </td>
                                <td>{{$product->product_name}}</td>
                                <td>${{$product->product_price}}</td>
                                <td>
                                    <a class="btn btn-primary mb-1" href="{{route('image.edit',$product->id)}}">Edit</a>
                                    <form action="{{route('image.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection