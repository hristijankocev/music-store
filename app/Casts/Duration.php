<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Duration implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return string
     */
    public function get($model, string $key, $value, array $attributes): string
    {
        $hours = floor($value / 3600);
        $minutes = floor($value / 60 % 60);
        $seconds = floor($value % 60);

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return int|float
     */
    public function set($model, string $key, $value, array $attributes): int|float
    {
        $timestamp = explode(':', $value);

        return ((int)$timestamp[0] * 3600) + ((int)$timestamp[1] * 60) + (int)$timestamp[2];
    }
}
