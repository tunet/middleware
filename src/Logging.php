<?php

declare(strict_types=1);

namespace Tunet\Middleware;

use Psr\Log\LoggerInterface;

final class Logging
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function handle(Request $request, callable $next): Response
    {
        $this->logger->info('Request.', [
            'request_id' => $request->requestId,
            'request' => $request,
        ]);

        $response = $next($request);

        $this->logger->info('Application responded.', [
            'request_id' => $request->requestId,
            'response' => $response,
        ]);

        return $response;
    }
}
