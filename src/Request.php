<?php

declare(strict_types=1);

namespace Tunet\Middleware;

final class Request
{
    public function __construct(
        public readonly string $requestId,
        public readonly string $title,
    ) {
    }
}
