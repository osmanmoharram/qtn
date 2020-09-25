<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
    
    public function quotation()
    {
        return $this->belongsTo(\App\Models\Quotation::class);
    }
}
