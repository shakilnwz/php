<?php


use Illuminate\Support\Collection;

// require the autoload file for accessing the collections
require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection(
    [
        1, 2, 3, 4, 5, 6, 7, 8
    ]
);

$lessThanFive = $numbers->filter(function ($num) {
    return $num <= 5;
});

var_dump($lessThanFive);
