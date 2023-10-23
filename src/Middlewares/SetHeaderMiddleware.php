<?php

declare(strict_types=1);

namespace DragonCode\LaravelJsonResponse\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Lmc\HttpConstants\Header;

class SetHeaderMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($this->set($request));
    }

    protected function set($request)
    {
        if (! $request->headers->has(Header::ACCEPT)) {
            $request->headers->set(Header::ACCEPT, 'application/json');
        }

        return $request;
    }
}
