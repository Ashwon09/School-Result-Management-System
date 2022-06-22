<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;

class TempStudentRequest extends FormRequest
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
            //
        ];
    }

    public function createStudent($temp)
    {
        $symbol_no = $this->generateRandomString();
        $lastRec = Student::latest()->first();
        if ($lastRec) {
            $symNo = $lastRec->symbol_number;
            $symNo = explode('-', $symNo);
            $symbol_no = $symbol_no . '-' . ($symNo[1] + 1);
        } else {
            $symbol_no = $symbol_no . '-1001';
        }
        return [
            'user_id' => $temp->user_id,
            'symbol_number' => $symbol_no,
            'first_name' => $temp->first_name,
            'last_name' => $temp->last_name,
            'contact_number' => $temp->contact_number,
            'email' => $temp->email,
            'dob' => $temp->dob,
            'gender' => $temp->gender,
            'class' => $temp->class,
            'father_name' => $temp->father_name,
            'province' => $temp->province,
            'district' => $temp->district,
            'address' => $temp->address,
        ];
    }

    public function updateInfoUser()
    {
        return[
            'role' => 'student',
        ];
    }

    public function updateInfo($temp)
    {

        return
            [
                'user_id' => $temp->user_id,
                'first_name' => $temp->first_name,
                'last_name' => $temp->last_name,
                'contact_number' => $temp->contact_number,
                'email' => $temp->email,
                'dob' => $temp->dob,
                'gender' => $temp->gender,
                'class' => $temp->class,
                'father_name' => $temp->father_name,
                'province' => $temp->province,
                'district' => $temp->district,
                'address' => $temp->address,
                'status' => 'completed',
            ];
    }


    private  function generateRandomString($length = 3)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
