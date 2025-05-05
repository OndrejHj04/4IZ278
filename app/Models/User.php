<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public static function getRandomUserId()
    {
        return self::inRandomOrder()->first()->id;
    }

    public function notifications(): HasMany {
        return $this->hasMany(Notification::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}
