<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDetailsRequest extends FormRequest
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
            'contact_number' => 'required|max:14',
            'dob' => 'required',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
        ];
    }

    public function updateDetails()
    {
        return [
            'contact_number' => $this->input('contact_number'),
            'dob' => $this->input('dob'),
            'province' => $this->input('province'),
            'district' => $this->input('district'),
            'address' => $this->input('address'),
        ];
    }
}
