<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRequest extends FormRequest
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
            'supplier_id' => 'required|exists:suppliers,id',
            'department_id' => 'required|exists:departments,id',
            'employee_id' => 'required|exists:employee,id',
            'quotation_date' => 'required|date',
            'status' => 'required|in:pending_approval,approved,rejected',
            'rejection_reason' => 'nullable|max:128',
            'tax' => 'nullable|numeric',
            'products.*.product_id' => 'required|numeric',
            'products.*.quantity' => 'required|numeric',
            'products.*.unit_price' => 'required|numeric'
        ];
    }
}
