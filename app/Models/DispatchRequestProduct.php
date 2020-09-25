<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchRequestProduct extends Model
{
    use HasFactory;

    public function dispatch_request()
    {
        return $this->hasOne(\App\Models\DispatchRequest::class);
    }

    public function employee()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
