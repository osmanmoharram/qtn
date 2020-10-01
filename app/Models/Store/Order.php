<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array|bool
     */
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['quantity', 'unit_price']);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
