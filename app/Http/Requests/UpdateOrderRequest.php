<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'employee_id' => 'required|exists:employees,id',
            'issued_at' => 'required|date',
            'status' => 'required|in:awaiting,online,received,stored',
            'payment_receipt' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'tax' => 'nullable|numeric',
            'product.*.product_id' => 'required|numeric',
            'product.*.quantity' => 'required|numeric',
            'product.*.unit_price' => 'required|numeric',
        ];
    }
}
