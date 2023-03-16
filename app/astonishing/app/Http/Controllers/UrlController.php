<?php

namespace App\Http\Controllers;

use App\Services\UrlRedirector;
use App\Services\UrlShortener;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UrlController extends Controller
{
    public function __construct(
        private readonly UrlShortener  $urlShortener,
        private readonly UrlRedirector $redirector,
    )
    {}

    public function store(Request $request): JsonResponse
    {
        return $this->urlShortener->create($request->input('long_url'));
    }

    public function show(string $code): Application|JsonResponse|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return $this->redirector->redirect($code);
    }
}
