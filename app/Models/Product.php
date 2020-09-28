<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array|bool
     */
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function proposals()
    {
        return $this->belongsToMany(Proposal::class);
    }

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class);
    }

    public function requests()
    {
        return $this->belongsToMany(Request::class);
    }
}
