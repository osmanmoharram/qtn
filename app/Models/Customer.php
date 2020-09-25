<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function quotations()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }

    public function supplier_quotation()
    {
        return $this->hasMany(\App\Models\SupplierQuotation::class);
    }
}
