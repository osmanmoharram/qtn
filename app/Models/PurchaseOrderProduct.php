<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderProduct extends Model
{
    use HasFactory;

    public function purchase_order()
    {
        return $this->belongsTo(\App\Models\PurchaseOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
