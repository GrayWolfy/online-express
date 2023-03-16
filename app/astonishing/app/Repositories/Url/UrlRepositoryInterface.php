<?php
declare(strict_types=1);

namespace App\Repositories\Url;

use App\Models\Url;

interface UrlRepositoryInterface
{
    public function findByLongUrl(string $longUrl): ?Url;
    public function save(Url $url): Url;
    public function findByCode(string $code): ?Url;
}
