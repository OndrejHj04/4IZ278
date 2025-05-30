<?php

namespace App;

enum UserRole: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    } 
    public static function toOptions(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
