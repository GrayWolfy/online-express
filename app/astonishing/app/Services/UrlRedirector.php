<?php
declare(strict_types=1);

namespace App\Services;


use App\Repositories\Url\UrlRepositoryInterface;
use App\Services\CacheAdapter\UrlCacheInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UrlRedirector
{
    public function __construct(
        private readonly UrlRepositoryInterface $repository,
        private readonly UrlCacheInterface      $cache,
    ) {}

    public function redirect(string $code): Application|JsonResponse|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $longUrl = $this->cache->get($code);

        if (!$longUrl) {
            $url = $this->repository->findByCode($code);
            if (!$url) {
                return response()->json(['error' => 'URL not found'], 404);
            }

            $longUrl = $url->getLongUrl();

            $this->cache->put($code, $longUrl, 1440);
        }

        return redirect()->away($longUrl);
    }
}
