<?php

namespace Harf;

/**
 * Array helper methods
 */
class Arr
{
    /**
     * Filter an array using a given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    public static function filter(array $array, callable $callback): array
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }
}
