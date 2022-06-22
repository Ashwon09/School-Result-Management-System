<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRegistrationRequest;
use App\Http\Requests\TempStudentRequest;
use App\Models\Student;
use App\Models\User;

class TempStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(StudentRegistrationRequest $tempstudent, Student $student, User $user)
    {
        $this->tempstudent =$tempstudent;
        $this->student=$student;
        $this->user=$user;
    }

    public function index()
    {
        $temporarystudent = $this->tempstudent->orderBy('created_at', 'asc')->where('status','waiting')->get();
        return view('admin.registerrequeststudent.index', compact('temporarystudent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TempStudentRequest $temp ,$id)
    {
        $student=$this->tempstudent::find($id);
        $user_id=$student->user_id;
        // dd($user_id);
        $user=$this->user::find($user_id);
        // dd($user);
        $user->update($temp->updateInfoUser());
        $student->update($temp->updateInfo($student));
        $this->student::create($temp->createStudent($student));
        return redirect()->route('student.view');
        // dd($student);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
