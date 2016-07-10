<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('products.partials.listLatestProducts', function($view){
            $view->with('latest', Product::latest()->take(6)->get() );
        });

    }


// select * from `posts` where `posts`.`category_id` in (1..20) order by `created_at` desc limit 1

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
