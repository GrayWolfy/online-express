<?php
declare(strict_types=1);

namespace App\Services;

use App\Factories\UrlFactory;
use App\Repositories\Url\UrlRepositoryInterface;
use App\Services\CacheAdapter\UrlCacheInterface;
use App\Validators\UrlValidator\UrlValidatorInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class UrlShortener
{
    public function __construct(
        private readonly UrlValidatorInterface  $validator,
        private readonly UrlCacheInterface      $cache,
        private readonly UrlRepositoryInterface $repository,
        private readonly UrlFactory             $factory,
        private readonly Str                    $str,
    )
    {}

    public function create(string $longUrl): JsonResponse
    {
        if (!$this->validator->validate($longUrl)) {
            return response()->json(['error' => 'Invalid URL'], 400);
        }
        $code = $this->cache->get(urlencode($longUrl));

        if ($code) {
            return response()->json(['short_url' => url($code)]);
        }

        $url = $this->repository->findByLongUrl($longUrl);
        if ($url) {
            $this->cache->put(urlencode($longUrl), $url->code, 1440);

            return response()->json(['short_url' => url($url->code)], 200);
        }

        $code = $this->str->random(6);

        $this->factory->create($longUrl, $code);

        $this->cache->put(urlencode($longUrl), $code, 1440);

        return response()->json(['short_url' => url($code)], 200);
    }
}
