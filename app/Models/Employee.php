<?php

namespace App\Models;

use App\Models\Quotations\Dispatch;
use App\Models\Store\Order;
use App\Models\Store\Proposal;
use App\Models\Store\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array|bool
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
