<?php

namespace App\Models;

use App\Models\Quotations\Dispatch;
use App\Models\Store\Order;
use App\Models\Store\Proposal;
use App\Models\Store\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public static function createWith($attributes = [])
    {
        $attributes = collect($attributes);

        // before we add new employee, we must create a user account for him
        $user = User::create(
            array_merge($attributes->only(['name', 'email', 'phone'])->toArray(), [
                    'password' => Hash::make($password = Str::random(16)),
            ])
        );

        // TODO: send randomly generated password to user email or phone

        return static::create([
          'address' => $attributes['address'],
          'branch_id' => $attributes['branch_id'],
          'department_id' => $attributes['department_id'],
          'is_branch_manager' => $attributes['is_branch_manager'],
          'is_department_manager' => $attributes['is_department_manager'],
          'user_id' => $user->id,
        ]);
    }

    public function updateWith($attributes = [])
    {
        $attributes = collect($attributes);

        $this->user->update($attributes->only(['name', 'email', 'phone'])->toArray());

        $this->update($attributes->only(['address', 'branch_id', 'department_id', 'is_branch_manager', 'is_department_manager'])->toArray());

        return $this;
    }

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
