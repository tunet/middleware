<?php

declare(strict_types=1);

namespace Tunet\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

final class Logging implements MiddlewareInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->logger->info('Request.', [
            'request_id' => $request->getBody(),
            'request' => $request,
        ]);

        $response = $handler->handle($request);

        $this->logger->info('Application responded.', [
            'request_id' => $request->getBody(),
            'response_status' => $response->getStatusCode(),
        ]);

        return $response;
    }
}
