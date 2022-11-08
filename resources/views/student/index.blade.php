@extends('layouts.master')
@section('content')
    <div class="container">
        <a class="btn btn-primary mt-3 mb-3" href="{{route('student.create')}}">Add Student</a>
        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Student Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>
                                    <img src="{{url('/uploads/', $student->student_img)}}" alt="Student image" width="80">
                                </td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->student_id}}</td>
                                <td>
                                    <a class="btn btn-primary mb-1" href="{{route('student.edit',$student->id)}}">Edit</a>
                                    <form action="{{route('student.destroy',$student->id)}}" method="POST">
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