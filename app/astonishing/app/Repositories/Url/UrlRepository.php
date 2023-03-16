<?php
declare(strict_types=1);

namespace App\Repositories\Url;

use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{

    public function __construct(private Url $model)
    {}

    public function findByLongUrl(string $longUrl): ?Url
    {
        return $this->model->where('long_url', $longUrl)->first();
    }

    public function save(Url $url): Url
    {
        $url->save();
        return $url;
    }

    public function findByCode(string $code): ?Url
    {
        return $this->model->where('code', $code)->first();
    }
}
