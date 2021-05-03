<?php
// Copyright
namespace App\Providers;

use App\Http\View\Composers\AuctionsComposer;
use App\Http\View\Composers\CategoriesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('frontend.layouts.app', CategoriesComposer::class);
        View::composer('frontend.layouts.app', AuctionsComposer::class);

    }
}
