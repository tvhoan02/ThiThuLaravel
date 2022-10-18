<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function get_all_student()
    {
        $data = Student::all();
        return view('students.student_manage', ['students' => $data]);
    }
    public function get_student_by_id($id)
    {
        $data = DB::table('students')->where('id' , '=', $id)->first();
         //dd($data);
        // echo "<pre>";
        // print_r($data);
        
        return view('students.student_edit', ['std' => $data]);
    }

    public function edit(Request $request, $id)
    {
        $std = Student::find($id);
        $request->validate([
            'fullname' => 'required|min:10|max:255',
            'birthday' => 'required',
            'address' => 'required|min:10|max:255',
        ]);
        $std->update([
            'fullname' => $request->name,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect()->route('all');
    }

   
}
