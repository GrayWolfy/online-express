<?php
namespace App\Http\Middleware;

use App\Services\UrlRedirector;
use Illuminate\Http\Request;
use Closure;


class ResolveUrlCode
{
    public function __construct(private UrlRedirector $redirector)
    {}
    public function handle(Request $request, Closure $next)
    {
        $code = str_replace('/', '', $request->getPathInfo());
        return $this->redirector->redirect($code);
    }
}
