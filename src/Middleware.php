<?php

declare(strict_types=1);

namespace Tunet\Middleware;

interface Middleware
{
    public function handle(Request $request, callable $next): Response;
}
