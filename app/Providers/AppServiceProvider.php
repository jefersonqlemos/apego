<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Storage;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.app', function ($view)
        {
            $links = Storage::disk('public')->get('links.json');
            $links = json_decode($links);

            $cartcount = Cart::content()->count();
            $view->with(compact('cartcount', 'links'));
        });

        $this->app->resolving(LengthAwarePaginator::class, static function (LengthAwarePaginator $paginator) {
            return $paginator->appends(request()->query());
        });
        $this->app->resolving(Paginator::class, static function (Paginator $paginator) {
            return $paginator->appends(request()->query());
        });

    }
}
