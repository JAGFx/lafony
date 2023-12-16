<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $local = $request->segment(1) ?? app()->getFallbackLocale();

        app()->setLocale($local);
        URL::defaults(['locale' => $local]);

        return $next($request);
    }
}
