<?php

declare(strict_types=1);

namespace Phico;

class SimpleRunner
{
    public function __construct(
        public Router $router,
    )
    {
    }

    public function run(): void
    {
        $this->router->path = parse_url($_SERVER['REQUEST_URI'])['path'] ?? "";
        [$method, $params] = $this->router->resolve();
        [$status, $content_type, $body] = $method(...$params);

        http_response_code($status);
        header("Content-Type: {$content_type}");
        echo $body;
    }
}