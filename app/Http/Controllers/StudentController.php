<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentFormValidation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $students = Student::all();
        return view('admin.student.view', compact('students'));
    }
    public function create()
    {
        return view('admin.student.create');
    }

    public function store(StudentFormValidation $request)
    {

        $user= User::create([
            'name' => $request['first_name'].' '.$request['last_name'],
            'email' => $request['email'],
            'role' => 'student',
            'password' => Hash::make($request['dob']),
        ]);
        Student::create($request->createStudent($user->id));
        return redirect('/admin/student/view');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentFormValidation $request, $id)
    {
        Student::updateOrCreate(['id'=>$id],$request->all());
        return redirect('/admin/student/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('admin/student/view');
        //
    }
}
