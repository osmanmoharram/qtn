<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierQuotationProduct extends Model
{
    use HasFactory;

    public function supplier_quotation()
    {
        return $this->belongsTo(\App\Models\SupplierQuotation::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
