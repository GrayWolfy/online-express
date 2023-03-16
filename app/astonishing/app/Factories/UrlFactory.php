<?php
declare(strict_types=1);

namespace App\Factories;

use App\Models\Url;

class UrlFactory
{
    public function create(string $longUrl, string $code): Url
    {
        $url = new Url();
        $url->long_url = $longUrl;
        $url->code = $code;
        $url->save();

        return $url;
    }
}
