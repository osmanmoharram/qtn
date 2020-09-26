<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array|bool
     */
    protected $guarded = [];

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
