<?php
declare(strict_types=1);

namespace App\Validators\UrlValidator;

class UrlValidator implements UrlValidatorInterface
{

    public function validate(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
