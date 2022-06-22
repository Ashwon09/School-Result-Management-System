<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Marks;

class MarksFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject_id' => 'required',
            'student_id' => 'required',
            'class'=>'required',
            'marks' => 'required|numeric|max:100|min:0',
        ];
    }

    public function createMarks()
    {
        $mark = $this->marks;
        if ($mark < 20) {
            $grade ="E";
        } elseif ($mark >= 20 && $mark < 30) {
            $grade ="D";
        } elseif ($mark >= 30 && $mark < 40) {
            $grade ="D+";
        } elseif ($mark >= 40 && $mark < 50) {
            $grade ="C";
        } elseif ($mark >= 50 && $mark < 60) {
            $grade ="C+";
        } elseif ($mark >= 60 && $mark < 70) {
            $grade ="B";
        } elseif ($mark >= 70 && $mark < 80) {
            $grade ="B+";
        } elseif ($mark >= 80 && $mark < 90) {
            $grade ="A";
        } elseif ($mark >= 90 && $mark < 100) {
            $grade ="A+";
        } else {
            $grade ="nil";
        }
        // dd($this->all());
        return [
            'subject_id' => $this->subject_id,
            'student_id' => $this->student_id,
            'class'=>$this->class,
            'marks' => $this->marks,
            'grade' => $grade,
        ];
    }

   
}
