<?php

namespace App\Helpers;

if (!function_exists('round_nearest')) {
    function round_nearest($value, $nearest = 1)
    {
        return round($value / $nearest) * $nearest;
    }
}
