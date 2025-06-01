<?php
namespace App\Helpers;

use Carbon\Carbon;

class DateFormatter
{
    public static function formatDate($date)
    {
        return Carbon::parse($date)->format('d. m. Y');
    }

    public static function formatTimestamp($dateTime)
    {
        return Carbon::parse($dateTime)->format('H:i, d. m. Y');
    }

    public static function timeFromNow($dateTime)
    {
        return Carbon::parse($dateTime)->diffForHumans();
    }
}