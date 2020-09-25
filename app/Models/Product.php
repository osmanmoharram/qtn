<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function quotation_products()
    {
        return $this->hasMany(\App\Models\QuotationProduct::class);
    }

    public function dispatch_request_products()
    {
        return $this->hasMany(\App\Models\DispatchRequestProduct::class);
    }

    public function proposal_request_products()
    {
        return $this->hasMany(\App\Models\ProposalRequestProduct::class);
    }

    public function supplier_quotation_products()
    {
        return $this->hasMany(\App\Models\SupplierQuotationProduct::class);
    }

    public function purchase_order_products()
    {
        return $this->hasMany(\App\Models\PurchaseOrderProduct::class);
    }
}
