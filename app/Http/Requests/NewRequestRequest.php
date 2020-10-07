<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequestRequest extends FormRequest
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
            'employee_id' => 'required|exists:employees,id',
            'request_date' => 'required|date',
            'status' => 'required|in:new,approved,rejected',
            'rejection_reason' => 'nullable|max:128',
            'products.*.product_id' => 'required|numeric',
            'products.*.quantity' => 'required|numeric'
        ];
    }
}
