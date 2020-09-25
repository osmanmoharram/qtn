<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function quotation()
    {
        return $this->hasMany(\App\Models\SupplierQuotation::class);
    }
    
    public function purchase_order()
    {
        return $this->hasMany(\App\Models\PurchaseOrder::class);
    }
}
