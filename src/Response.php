<?php

declare(strict_types=1);

namespace Tunet\Middleware;

final class Response
{
    public function __construct(
        public readonly Status $status,
    ) {
    }
}
