<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function quotation()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }

    public function dispatch_request()
    {
        return $this->hasMany(\App\Models\DispatchRequest::class);
    }

    public function supplier_quotation()
    {
        return $this->hasMany(\App\Models\SupplierQuotation::class);
    }
}
