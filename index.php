<?php

require_once __DIR__ . '/vendor/autoload.php';

use Harf\Arr;

$res = [];


$res[] = Arr::some([1, 2, 3], 3);
$res[] = Arr::some(["a" => 1, "b" => "foo", "c" => 3], "foo");
$res[] = Arr::some([1, 2, 3], 0, true);

$res[] = Arr::map([1, 2, 3], fn ($i) => $i += 1);

die(var_dump(...$res));
