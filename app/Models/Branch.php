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

    public function employee()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function quotation()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }
}
