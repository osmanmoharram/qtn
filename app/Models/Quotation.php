<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function branch()
    {
        return $this->hasOne(\App\Models\Branch::class);
    }

    public function department()
    {
        return $this->hasOne(\App\Models\Department::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
