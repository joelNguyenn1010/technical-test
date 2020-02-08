<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRole extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //       max:255 rule because we store name as varchar(255) in database
        return [
            //
            'name' => 'required|max:255|unique:roles'
        ];
    }
}
