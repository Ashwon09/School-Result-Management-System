<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teachers;
use App\Http\Requests\TeacherRequest;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(Subject $subject, Teachers $teacher)
    {
        $this->subject = $subject;
        $this->teacher = $teacher;
    }
    public function index()
    {
        $teachers = $this->teacher->orderBy('created_at', 'asc')->get();

        return view('admin.teachers.index', compact('teachers'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = $this->subject->get();
        return view('admin.teachers.create', compact('subjects'));   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        // dd($request->createTeacher());
        $this->teacher::create($request->createTeacher());
        return redirect()->route('teacher.view'); //
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
        $subjects = $this->subject->get();
        $teacher = $this->teacher::find($id);
        return view('admin.teachers.edit', compact('teacher', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = $this->teacher::find($id);
        $teacher->update($request->createTeacher());
        return redirect()->route('teacher.view'); //

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
        $teacher = $this->teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher.view');
    }
}
