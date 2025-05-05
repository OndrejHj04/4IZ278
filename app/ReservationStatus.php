<?php

namespace App;

enum ReservationStatus: string
{
    case Pending = "pending";
    case Confirmed = "confirmed";
    case Rejected = "rejected";

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }   
}
