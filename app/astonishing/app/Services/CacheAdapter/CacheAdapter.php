<?php
declare(strict_types=1);

namespace App\Services\CacheAdapter;

use Illuminate\Support\Facades\Cache;

class CacheAdapter implements UrlCacheInterface
{
    public function get(string $key)
    {
        return Cache::get($key);
    }

    public function put(string $key, $value, $ttl)
    {
        Cache::put($key, $value, $ttl);
    }
}
