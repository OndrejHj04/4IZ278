<?php

namespace App;

enum UserRole: string
{
    case Admin = 'admin';
    case User = 'user';
    case Public = 'public';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }   
}
