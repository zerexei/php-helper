<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Harf\Arr;

// ./vendor/bin/phpunit ./tests/PagesTest.php
final class ArrFilterTest extends TestCase
{
    /** @test */
    public function can_filter_array()
    {
        $array = [782, "a" => 434, 102, 47, "b" => 301, 604, 305, 877, "c" => 5, 102, 785, "d" => 500, 434];
        $lessThanFiveHundred = fn ($item) => $item < 500;
        $filtered = Arr::filter(array: $array, callback: $lessThanFiveHundred);

        $expected = ["a" => 434, "b" => 301, "c" => 5, 102, 47, 305, 102, 434];
        $this->assertEquals(expected: $filtered, actual: $expected);
    }

    /** @test */
    public function not_empty_array()
    {
        $array = [782, "a" => 434, 102, 47, "b" => 301];
        $lessThanFiveHundred = fn ($item) => $item < 500;
        $filtered = Arr::filter(array: $array, callback: $lessThanFiveHundred);

        $expected = [];
        $this->assertNotEquals(expected: $filtered, actual: $expected);
    }

    /** @test */
    public function return_empty_array_on_filter_empty_array()
    {
        $c = fn ($item) => $item;
        $filtered = Arr::filter(array: [], callback: $c);

        $this->assertEquals(expected: $filtered, actual: []);
    }
}
