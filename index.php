<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Harf\Arr;

// filter method
$filtered = Arr::filter([1, 23, 5, 51, 6], fn ($item) => $item < 9);
