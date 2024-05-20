<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function searchStudent(Request $request)
    {
        $studentId = $request->input('student_id');

        $student = Student::where('student_id', $studentId)->first();

        if ($student) {
            $studentName = $student->name;
            return view('studenthome', compact('studentName')); // Redirect to student portal with name
        }

        return back()->with('error', 'Student ID not found.');
    }
    
}
