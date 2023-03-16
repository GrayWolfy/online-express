<?php
declare(strict_types=1);

namespace App\Services\CacheAdapter;

interface UrlCacheInterface
{
    public function get(string $key);
    public function put(string $key, $value, $ttl);
}
