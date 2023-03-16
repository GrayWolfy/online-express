<?php
declare(strict_types=1);

namespace App\Validators\UrlValidator;

interface UrlValidatorInterface
{
    public function validate(string $url): bool;
}
