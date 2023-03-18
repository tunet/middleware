<?php

declare(strict_types=1);

namespace Tunet\Middleware;

enum Status: string
{
    case OK = 'OK';
    case BAD_REQUEST = 'BAD_REQUEST';
}
