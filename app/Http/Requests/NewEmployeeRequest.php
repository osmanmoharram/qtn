<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: use policy
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:14', 'min:10'],
            'address' => ['required'],
            'branch_id' => ['required', 'exists:branches,id'],
            'is_branch_manager' => ['required', 'boolean'],
            'department_id' => ['required', 'exists:departments,id'],
            'is_department_manager' => ['required', 'boolean'],
        ];
    }
}
