<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSupplierRequest extends FormRequest
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
            'name' => 'required|min:2|max:128',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required|min:10|max:15',
            'address' => 'max:128',
        ];
    }
}
