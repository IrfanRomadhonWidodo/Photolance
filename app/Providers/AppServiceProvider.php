<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Usamamuneerchaudhary\Commentify\Providers\CommentifyServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(CommentifyServiceProvider::class);
    }

    public function boot(): void
    {
        Paginator::useTailwind();
    }
}
