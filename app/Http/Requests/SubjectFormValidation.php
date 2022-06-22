<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectFormValidation extends FormRequest
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
            'subject_name' => 'required|max:15',
            'description' => 'max:1000',
            //
        ];
    }
    public function createSubject()
    {
        return [
            'subject_name' => $this->subject_name,
            'description' => $this->description,
        ];
    }
}
