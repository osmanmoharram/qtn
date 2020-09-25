<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchRequest extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function employee()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    public function products()
    {
        return $this->hasMany(\App\Models\DispatchRequestProduct::class);
    }
}
