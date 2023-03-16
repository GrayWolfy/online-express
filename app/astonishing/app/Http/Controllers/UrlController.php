<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlRedirector;
use App\Services\UrlShortener;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function __construct(private UrlShortener $urlShortener, private UrlRedirector $redirector)
    {}

    public function store(Request $request)
    {
        return $this->urlShortener->create($request->input('long_url'));
    }

    public function show($code)
    {
        return $this->redirector->redirect($code);
    }
}
