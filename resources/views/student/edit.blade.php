@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Student Name</label>
                      <input type="text" class="form-control" id="name"  name='name' value="{{$student->name}}">
                      @error('name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="student_id" class="form-label">Student ID</label>
                      <input type="text" class="form-control" id="student_id"  name='student_id' value="{{$student->student_id}}">
                      @error('student_id')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="student_img" class="form-label">Student Image</label>
                      <input type="file" class="form-control" id="student_img"  name='student_img'>
                      @error('student_img')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div> 
                   <div class="mb-3">
                    <img src="{{url('/uploads', $student->student_img)}}" width="120" alt="Student image">
                   </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
    </div>
@endsection