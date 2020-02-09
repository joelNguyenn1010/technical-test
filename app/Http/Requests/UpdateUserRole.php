<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//Request for updating user role
class UpdateUserRole extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'The id of the user is missing',
            'role_id.required'  => 'The id of the role is missing',
        ];
    }
}
