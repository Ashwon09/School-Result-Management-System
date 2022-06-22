<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Marks;
use PhpParser\Node\Stmt\Foreach_;

class viewResultController extends Controller
{

    public function resultView(Request $request)
    {
        // dd($request->all());
        $student = Student::where('symbol_number', $request->symbol_number)->first();
        // dd($student);
        if ($student) {
            if ($request->dob == $student->dob) {
                // dd($student);
                $marks = Marks::where('student_id', $student->id)->where('class', $request->class)->get();
                $check = Marks::where('student_id', $student->id)->where('class', $request->class)->first(); 
                // dd($marks); 
                if ($check) {
                    $count = 0;
                    $sum = 0;
                    foreach ($marks as $mark) {
                        $count++;
                        $sum = $sum + $mark->marks;
                    }
                    $percentage = $sum / $count;
                    $grade = $this->getGrade($percentage);
                } else {
                    return redirect()->back()->with('message', 'No Results Found');
                }
                return view('result', compact('marks', 'student', 'grade', 'sum', 'percentage','count'));
            } else {
                return redirect()->back()->with('message', 'Date of Birth did not match');
            }
        } else {
            return redirect()->back()->with('message', 'Symbol Number did not match');
        }
    }

    private function getGrade($mark)
    {
        if ($mark < 20) {
            return ["E", "Very Insuffcient"];
        } elseif ($mark >= 20 && $mark < 30) {
            return ["D", "Insufficient"];
        } elseif ($mark >= 30 && $mark < 40) {
            return ["D+", "Partially Acceptable"];
        } elseif ($mark >= 40 && $mark < 50) {
            return ["C", "Acceptable"];
        } elseif ($mark >= 50 && $mark < 60) {
            return ["C+", "Satisfactory"];
        } elseif ($mark >= 60 && $mark < 70) {
            return ["B", "Good"];
        } elseif ($mark >= 70 && $mark < 80) {
            return ["B+", "Very Good"];
        } elseif ($mark >= 80 && $mark < 90) {
            return ["A", "Excellent"];
        } elseif ($mark >= 90 && $mark < 100) {
            return ["A+", "Outstanding"];
        } else {
            return ["nil", "nil"];
        }
    }
}
