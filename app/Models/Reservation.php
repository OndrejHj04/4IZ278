<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
