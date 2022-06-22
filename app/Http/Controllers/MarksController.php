<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Marks;
use App\Http\Requests\MarksFormValidation;


class MarksController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marks = Marks::all();
        return view('admin.marks.view', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::get();
        $students = Student::get();
        return view('admin.marks.create', compact('subjects', 'students'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarksFormValidation $request)
    {
        // dd($request->all());
        $check = Marks::where('student_id', $request->student_id)->get();
        //dd($check);
        $student = Student::find($request->student_id);
        // dd($student->class);
        $studentClass = $student->class;
        $studentClass = explode(' ', $studentClass);
        $marksClass = $request->class;
        $marksClass = explode(' ', $marksClass);
        // dd($marksClass[1] > $studentClass[1]); 
        if ($marksClass[1] > $studentClass[1]) {
            return redirect('/admin/marks/view')->with('message', 'Student has not studied this class yet');
        }
        foreach ($check as $ch) {
            if ($ch->subject_id == $request->subject_id && $ch->class == $request->class) {
                return redirect('/admin/marks/view')->with('message', 'Duplicate Entry');
            }
        }
        Marks::create($request->createMarks());
        return redirect('/admin/marks/view');
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
        $mark = Marks::find($id);
        // dd($mark);
        $students = Student::get();
        $subjects = Subject::get();
        return view('admin.marks.edit', compact('mark', 'students', 'subjects'));
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
        // dd($request->all());

        $marks = Marks::find($id);
        $grade = $this->getGrade($request->marks);
        $marks->subject_id = $marks->subject_id;
        $marks->student_id = $marks->student_id;
        $marks->class = $marks->class;
        $marks->marks = $request->marks;
        $marks->grade = $grade;
        $marks->update();
        return redirect('/admin/marks/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Marks::find($id);
        $mark->delete();
        return redirect('admin/marks-view');
        //
    }

    private function getGrade($mark)
    {

        if ($mark < 20) {
            return "E";
        } elseif ($mark >= 20 && $mark < 30) {
            return "D";
        } elseif ($mark >= 30 && $mark < 40) {
            return "D+";
        } elseif ($mark >= 40 && $mark < 50) {
            return "C";
        } elseif ($mark >= 50 && $mark < 60) {
            return "C+";
        } elseif ($mark >= 60 && $mark < 70) {
            return "B";
        } elseif ($mark >= 70 && $mark < 80) {
            return "B+";
        } elseif ($mark >= 80 && $mark < 90) {
            return "A";
        } elseif ($mark >= 90 && $mark < 100) {
            return "A+";
        } else {
            return "nil";
        }
    }
}
