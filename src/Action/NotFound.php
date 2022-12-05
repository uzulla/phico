<?php

declare(strict_types=1);

namespace Phico\Action;

class NotFound
{
    static public function getInvokable(): \Closure
    {
        return fn() => [404, 'text/html', 'NotFound'];
    }
}