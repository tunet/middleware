<?php

declare(strict_types=1);

namespace Tunet\Middleware;

interface Handler
{
    public function handle(Request $request): Response;
}
