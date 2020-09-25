<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalRequestProduct extends Model
{
    use HasFactory;

    public function proposal_request()
    {
        return $this->belongsTo(\App\Models\ProposalRequest::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
