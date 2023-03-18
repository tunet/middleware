<?php

declare(strict_types=1);

namespace Tunet\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Application
{
    /**
     * @param list<MiddlewareInterface> $middlewares
     */
    public function __construct(
        private readonly RequestHandlerInterface $handler,
        private readonly array $middlewares,
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return (new Pipeline($this->handler, $this->middlewares))->handle($request);
    }
}
