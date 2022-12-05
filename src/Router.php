<?php

declare(strict_types=1);

namespace Phico;

use Phico\Action\NotFound;

class Router
{
    public function __construct(
        public array $route = [],
        public string $path = "/",
    )
    {
    }

    public function resolve(): ?array
    {
        foreach ($this->route as $regex => $invokable) {
            if (preg_match($regex, $this->path, $_)) {
                $param = array_filter(
                    $_,
                    fn($i) => !is_int($i),
                    ARRAY_FILTER_USE_KEY
                );
                return [$invokable, $param];
            }
        }
        return [NotFound::getInvokable(), []];
    }
}