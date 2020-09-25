<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchRequestProduct extends Model
{
    use HasFactory;

    public function dispatch_request()
    {
        return $this->belongsTo(\App\Models\DispatchRequest::class);
    }


    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
