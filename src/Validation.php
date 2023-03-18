<?php

declare(strict_types=1);

namespace Tunet\Middleware;

final class Validation
{
    public function handle(Request $request, callable $next): Response
    {
        if ($request->title === '') {
            return new Response(Status::BAD_REQUEST);
        }

        return $next($request);
    }
}
