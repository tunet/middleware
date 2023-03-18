<?php

declare(strict_types=1);

namespace Tunet\Middleware;

final class BusinessLogic implements Handler
{
    public function handle(Request $request): Response
    {
        return new Response(Status::OK);
    }
}
