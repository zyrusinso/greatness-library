<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowersRequest extends FormRequest
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
            'user_id' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'course' => ['required'],
            'date_of_birth' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Please select a user'
        ];
    }
}
