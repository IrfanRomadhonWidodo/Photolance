<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Usamamuneerchaudhary\Commentify\Providers\CommentifyServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(CommentifyServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
    }
}
