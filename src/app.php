<?php

declare(strict_types=1);

namespace Tunet\Middleware;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Nyholm\Psr7\ServerRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$logger = new Logger('main', [new StreamHandler('php://stdout')]);

$application = new Application(
    handler: new BusinessLogic(),
    middlewares: [
        new Logging($logger),
        new Validation(),
    ],
);

$requestId = uniqid();
$request = (new ServerRequest('GET', '/api', [], $requestId))->withParsedBody(['requestId' => $requestId]);
$respose = $application->handle($request);
