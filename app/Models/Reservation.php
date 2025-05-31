<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getRandomReservationId()
    {
        return self::inRandomOrder()->first()->id;
    }

    public function leader(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function members(): BelongsToMany 
    {
        return $this->belongsToMany(User::class, 'users_reservations');
    }

    public function outsideUsers() 
    {
        $memberIds = $this->members()->pluck('users.id');
        return User::whereNotIn('id', $memberIds);
    }
}
