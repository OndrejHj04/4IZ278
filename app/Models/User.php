<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public static function getRandomUserId()
    {
        return self::inRandomOrder()->first()->id;
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function reservations(): BelongsToMany{
        return $this->belongsToMany(Reservation::class, 'users_reservations');
    }

    public function notifications(): HasMany{
        return $this->hasMany(Notification::class);
    }
}
