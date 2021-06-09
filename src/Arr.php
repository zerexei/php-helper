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
        if (empty($array)) return [];

        $filtered = array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
        $indexed = array_filter($filtered, fn ($v, $k) => is_integer($k), ARRAY_FILTER_USE_BOTH);
        $associative = array_filter($filtered, fn ($v, $k) => !is_integer($k), ARRAY_FILTER_USE_BOTH);

        return array_merge($associative, $indexed);
    }

    /**
     * Check if target exists on array
     * 
     * @param string|int $target
     * @param array $array
     * @param bool $byKey
     * @return bool
     */
    public static function some(string|int $target, array $array, bool $byKey = false): bool
    {

        if (!$byKey) {
            return in_array(needle: $target, haystack: $array, strict: true);
        }

        return array_key_exists(key: $target, array: $array);
    }

    /**
     * Map through array items
     * 
     * @param array $array
     * @param callable $callback
     * @return array
     */
    public static function map(array $array, callable $callback): array
    {
        return array_map($callback, $array);
    }
    // map
    // find
    // findIndex
    // every


}
