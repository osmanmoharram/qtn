<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function quotations()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }

    public function dispatch_requests()
    {
        return $this->hasMany(\App\Models\DispatchRequest::class);
    }

    public function supplier_quotations()
    {
        return $this->hasMany(\App\Models\SupplierQuotation::class);
    }
}
