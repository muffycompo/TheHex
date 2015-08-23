<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewCustomerRequest extends Request
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
            'firstname'=> 'required|max:45',
            'lastname'=> 'required|max:45',
            'dob'=> 'required',
            'phone'=> 'required',
            'hostel_address'=> 'required'
        ];
    }
}
