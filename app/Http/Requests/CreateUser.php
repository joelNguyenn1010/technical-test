<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//request for creating new user
class CreateUser extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//       max:255 rule because we store name, email as varchar(255) in database
        return [
            //
            'email' => 'required|unique:users|max:255|email',
            'name' => 'required|max:255',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
