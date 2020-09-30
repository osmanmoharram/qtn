<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory, HasRoles;

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

    protected $guard_name = 'web';

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
