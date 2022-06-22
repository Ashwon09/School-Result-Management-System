<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Student;
class StudentFormValidation extends FormRequest
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
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'contact_number' => 'max:14',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'class' => 'required',
            'father_name' => 'required|max:30',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
        ];
    }

    public function createStudent($user_id)
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
            'user_id'=>$user_id,
            'symbol_number' => $symbol_no,
            'first_name' => $this->first_name,
            'last_name' => $this->input('last_name'),
            'contact_number' => $this->input('contact_number'),
            'email' => $this->input('email'),
            'dob' => $this->input('dob'),
            'gender' => $this->input('gender'),
            'class' => $this->input('class'),
            'father_name' => $this->input('father_name'),
            'province' => $this->input('province'),
            'district' => $this->input('district'),
            'address' => $this->input('address'),
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
