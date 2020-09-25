<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierQuotation extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }

    public function supplier_quotation_products()
    {
        return $this->hasMany(\App\Models\SupplierQuotationProduct::class);
    }
}
