<?php

namespace App\Providers;

use App\Repositories\Url\UrlRepository;
use App\Repositories\Url\UrlRepositoryInterface;
use App\Services\CacheAdapter\CacheAdapter;
use App\Services\CacheAdapter\UrlCacheInterface;
use App\Validators\UrlValidator\UrlValidator;
use App\Validators\UrlValidator\UrlValidatorInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            UrlValidatorInterface::class,
            UrlValidator::class
        );

        $this->app->bind(
            UrlCacheInterface::class,
            CacheAdapter::class
        );

        $this->app->singleton(
            UrlRepositoryInterface::class,
            UrlRepository::class
        );
    }
}
