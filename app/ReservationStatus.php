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

    public static function toOptions(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
