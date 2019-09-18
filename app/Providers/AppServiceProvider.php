<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('pages.meniu.categories', function ($view) {
            $categories = \App\Category::parents()->active()->get();
            $view->with(compact('categories'));
        });

        if (auth()) {
            view()->composer('layouts.app', function ($view) {
                $messageCount = \App\Message::active()->unread()->where('receiver_id', auth()->id())->count();
                $view->with(compact('messageCount'));
            });
        }
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
