<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

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

    public function store(Request $request)
{
    $studentId = $request->input('student_id');
    $duplicateExists = Student::where('student_id', $studentId)->exists();

    if ($duplicateExists) {
        // Handle duplicate case (display error in modal)
        return back()->withErrors(['student_id' => 'This student ID already exists!']);
    }

    $data = $request->validate([
        'name' => 'required',
        // Remove unique rule for student_id
        'student_id' => 'required',
        'year_section' => 'required',
        'course' => 'required',
    ]);

    $newStudent = Student::create($data);
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
        $data['last_seen'] = now();
        //$student->update($data);       
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
