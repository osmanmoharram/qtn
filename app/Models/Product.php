<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function quotation()
    {
        return $this->belongsTo(\App\Models\Quotation::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function dispatch_request_product()
    {
        return $this->belongsTo(\App\Models\DispatchRequestProduct::class);
    }

    public function proposal_request_product()
    {
        return $this->belongsTo(\App\Models\ProposalRequestProduct::class);
    }

    public function supplier_quotation_product()
    {
        return $this->belongsTo(\App\Models\SupplierQuotationProduct::class);
    }

    public function purchase_order_product()
    {
        return $this->belongsTo(\App\Models\PurchaseOrderProduct::class);
    }
}
