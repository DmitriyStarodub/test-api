<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProdider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind( \App\Repositories\Contracts\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind( \App\Repositories\Contracts\ProductRepositoryInterface::class, \App\Repositories\ProductRepository::class);
    }
}