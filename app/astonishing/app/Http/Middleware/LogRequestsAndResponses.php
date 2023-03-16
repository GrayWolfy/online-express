<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequestsAndResponses
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $this->logRequest($request);
        $this->logResponse($response);
        return $response;
    }

    private function logRequest($request)
    {
        Log::info('Request', [
            'method' => $request->method(),
            'url' => $request->url(),
            'parameters' => $request->all(),
        ]);
    }

    private function logResponse($response)
    {
        Log::info('Response', [
            'content' => $response->getContent(),
            'status' => $response->status(),
        ]);
    }
}
