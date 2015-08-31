<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewRolloverRequest extends Request
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
            'from_thc' => 'required|exists:customers,thc',
            'to_thc' => 'required|exists:customers,thc',
//            'rollover_amount' => 'required|numeric',
        ];
    }
}
