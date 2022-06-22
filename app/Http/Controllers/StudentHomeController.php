<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Marks;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StudentDetailsRequest;
use Illuminate\Support\Facades\Validator;

class StudentHomeController extends Controller
{
    public function __construct(User $user, Marks $marks, Student $student)
    {
        $this->user = $user;
        $this->marks = $marks;
        $this->student = $student;
    }
    //
    public function details()
    {
        // dd(Auth::user()->name);

        if (Auth::User()->role == 'temp_student') {
            $student = Auth::User()->studentRegistrationRequest;
            return view('student.details', compact('student'));
        } elseif (Auth::User()->role == 'student') {
            $student = Auth::User()->student;
            return view('student.details', compact('student'));
        } elseif (Auth::User()->role == 'admin') {
            return redirect()->route('admin.index');
        }
    }

    public function status()
    {
        return view('student.status');
    }
    public function password()
    {
        return view('student.password');
    }

    public function result()
    {
        $marks = Auth::User()->student->marks;

        return view('student.result', compact('marks'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {


        // dd($request->all());
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
        $renewPassword = $request->password_confirmation;

        $userPassword = Auth::user()->password;

        if (Hash::check($oldPassword, $userPassword)) {
            if ($newPassword == $renewPassword) {
                // dd('correct');
                $user = $this->user::find(Auth::user()->id);
                // dd($user);
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('messageall', 'Your password changed successfully');
            } else {
                return redirect()->back()->with('message', 'Your new password and password confirmation does not match');
            }
        } else {
            return redirect()->back()->with('message', 'Your Password is incorrect');
        }
    }


 

    public function changeDetails(StudentDetailsRequest $request)
    {
        // dd($request->all());
        $student = Auth::User()->student;
        // dd($student);
        $student->update($request->updatedetails());
        return redirect()->route('studenthome.details'); //

    }
}
