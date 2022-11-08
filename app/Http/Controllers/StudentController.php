<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'required|numeric',
            'student_img' => 'required|mimes:png,jpg,jpeg,webp|max:2048|image',
        ]);

        if($request->hasFile('student_img')){
            $image_name = date('YmdHis').'.'.$request->file('student_img')->extension();
            Image::make($request->file('student_img'))->resize(600,600)->insert('watermark/watermark.png','center')->save(public_path('/uploads/').$image_name);
        }

        $student = new Student();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->student_img = $image_name;

        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student =  Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'student_id' => 'required|numeric',
        ]);

        if($request->hasFile('student_img')){
            $request->validate([
            'student_img' => 'required|mimes:png,jpg,jpeg,webp|max:2048|image',
            ]);

            if(file_exists(public_path('/uploads/').$student->student_img)){
                unlink(public_path('/uploads/').$student->student_img);
            }

            $image_name = date('YmdHis').'.'.$request->file('student_img')->extension();
            Image::make($request->file('student_img'))->resize(600,600)->insert('watermark/watermark.png','center')->save(public_path('/uploads/').$image_name);
            $student->student_img = $image_name;
        }

        $student->name = $request->name;
        $student->student_id = $request->student_id;

        $student->update();

        return redirect()->route('student.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if((file_exists(public_path('/uploads/').$student->student_img))){
            unlink(public_path('/uploads/').$student->student_img);
        }
        $student->delete();
        return redirect()->route('student.index');
    }
}
