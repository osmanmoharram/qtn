<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function manager()
    {
        return $this->hasOne(\App\Models\User::class);
    }

    public function employees()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function quotations()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }
}
