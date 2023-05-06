<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\Category;


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

        if (!app()->isLocal()) {
            URL::forceScheme('https');
        }

        $main = Category::where('type', 'main')->get();
        $sub1 = Category::where('type', 'sub1')->get();
        $sub2 = Category::where('type', 'sub2')->get();

        
        view()->composer(
            'layouts.navigation',
            function($view) use ($main, $sub1, $sub2) {
                $view->with('main', $main)->with('sub1', $sub1)->with('sub2', $sub2);
            }
        );
    }
}


