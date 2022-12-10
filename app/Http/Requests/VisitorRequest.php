<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
            'fname' => ['required'],
            'lname' => ['required'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'postal' => ['required', 'numeric'],
            'stud_id' => ['required'],
            'course' => ['required'],
            'terms' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'terms.required' => 'You need to agree in the terms and condition',
        ];
    }
}
