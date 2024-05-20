<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $students = student::all();
        return view('student.index',['students' => $students]);
      
    }
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'year_section' => 'required',
            'course' => 'required',
            
        ]);

        $newstudent = student::create($data);
        return redirect(route('student.index'));
    }
    public function edit(student $student){
        return view('student.edit',['student' => $student]);
    }
    public function update(student $student, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'year_section' => 'required',
            'course' => 'required',
            
        ]);

        $student->update($data);
        return redirect(route('student.index'))->with('success','Updated Successfully');
    }
    public function destroy(student $student){
        $student->delete();
        return redirect(route('student.index'))->with('success','Deleted Successfully');
    }
    public function show(student $student){
        return view('student.show',['student' => $student]);
    }
}
