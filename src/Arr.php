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
     * @param array $array
     * @param string|int $target
     * @param bool $byKey
     * @return bool
     */
    public static function some(array $array, string|int $target, bool $byKey = false): bool
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
        return array_map(callback: $callback, array: $array);
    }

    /**
     * Iteratively reduce the array to a single value using a callback function
     * 
     * @param array $array
     * @param callable $callback
     * @param mixed $initial
     * @return mixed
     */
    public static function reduce(array $array, callable $callback, mixed $initial = 0): mixed
    {
        return array_reduce(array: $array, callback: $callback, initial: $initial);
    }

    /**
     * Find a value on an array then return value
     * 
     * @param array $array
     * @param int|string $key
     * @return int|string|false
     */
    public static function find(array $array, int|string $key): int|string|false
    {
        $key = array_search(needle: $key, haystack: $array, strict: true);
        return $key ? $array[$key] : false;
    }

    /**
     * Find a value on an array then return key
     * 
     * @param array $array
     * @param int|string $key
     * @return int|string|false
     */
    public static function findIndex(array $array, int|string $key): int|string|false
    {
        return array_search(needle: $key, haystack: $array, strict: true);
    }

    /**
     * Remove duplicates from array
     * 
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array
    {
        return array_unique(array: $array);
    }

    /**
     * Check if all element passed the callback
     */
    public static function every(array $array, callable $callback): bool
    {
        foreach ($array as $item) {
            if (!$callback($item)) {
                return false;
            }
        }
        return true;
    }
}
