<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

$r = new \Phico\Router();

// => /
$r->route['|\A/\z|u'] = function () {
    return [200, 'text/html', "
        <h1>index</h1>
        <ul>
            <li><a href='/hello/world'>hello world</a></li>
            <li><a href='/calc/2022/plus/1'>2022 + 1</a></li>
            <li><a href='/notfound'>notfound</a></li>
        </ul>
    "];
};

// => /hello/uzulla
$r->route['|\A/hello/(?<name>.+)|u'] = function (string $name) {
    return [200, 'text/html', "Hello {$name}"];
};

// => /calc/year/2022/plus/2
$r->route['|\A/calc/(?<year>\d+)/plus/(?<plus_year>\d+)|u'] = function (string $year, string $plus_year) {
    $calculated_year = (int)$year + (int)$plus_year;
    return [200, 'text/html', "{$year} + {$plus_year} = {$calculated_year}"];
};

$app = new \Phico\SimpleRunner($r);
$app->run();
