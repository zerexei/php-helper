<?php

require_once __DIR__ . '/vendor/autoload.php';

use Harf\Arr;

$res = [];


$res[] = Arr::some(3, [1, 2, 3]);
$res[] = Arr::some("foo", ["a" => 1, "b" => "foo", "c" => 3]);
$res[] = Arr::some(0, [1, 2, 3], true);

$res[] = Arr::map([1, 2, 3], fn ($i) => $i += 1);

die(var_dump(...$res));
