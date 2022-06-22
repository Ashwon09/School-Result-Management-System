<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordFormRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{


    function __construct(Subject $subject, Teachers $teacher, Student $student, User $user)
    {
        $this->subject = $subject;
        $this->teacher = $teacher;
        $this->student = $student;
        $this->user = $user;
    }

    public function index()
    {
        $teachers = $this->teacher->orderBy('created_at', 'asc')->get();
        $students = $this->student->orderBy('created_at', 'asc')->get();
        $subjects = $this->subject->orderBy('created_at', 'asc')->get();
        return view('admin.index', compact('teachers', 'students', 'subjects'));
    }

    public function resetForm()
    {
        return view('admin.passwordreset.reset');
    }

    public function resetpassword(ResetPasswordFormRequest $request)
    {
        // dd(auth()->user());
        // dd($request->all());
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $student = $this->student::where('first_name', $first_name)->where('email', $email)->where('last_name', $last_name)->first();
        if ($student) {
            $user = $student->user;
            // dd($student);
            $user->password = Hash::make($student->dob);
            $user->save();
            return redirect()->back()->with('messageall', 'Password has been Reset');
        } else {
            return redirect()->back()->with('message', 'No match found');
        }
    }

    public function teacherSubject()
    {
        $subjects = $this->subject->orderBy('created_at', 'asc')->get();
        return view('admin.teacherandsubject', compact('subjects'));
    }

    public function findTeacher(Request $request)
    {
        $teachers = $this->teacher->where('subject_id', $request->id)->get();
        return response()->json($teachers);
    }

    public function findTeacherEmail(Request $request)
    {
        $email = $this->teacher->select('email')->find($request->id);
        return response()->json($email);
    }

    public function teacherCreate()
    {
        $subjects = $this->subject->get();
        return view('admin.createTeacher', compact('subjects'));
    }

    function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'subject_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $values = [
                'first_name' => $request->first_name,
                'last_name' => $request->first_name,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'subject_id' => $request->subject_id
            ];

            $query = $this->teacher::create($values);
            if ($query) {
                return response()->json(['status' => 1, 'msg' => 'New teacher has been successfully registered']);
            }
        }
    }

    public function subjectCreate()
    {
        return view('admin.subjectrepeater');
    }


    public function saveSubject(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'subject_name.*'=>'required'
        ]);

        $subject_name = $request->subject_name;
        $description = $request->description;

        for ($i = 0; $i < count($subject_name); $i++) {
            $datasave = [
                'subject_name' => $subject_name[$i],
                'description' => $description[$i],
            ];
            $this->subject::create($datasave);
        }
        return back()->with('message', 'Subject Successfully Added');
    }


    public function display(Request $request){
        dd($request->all());
    }
    //
}
