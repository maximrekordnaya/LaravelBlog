<?php

namespace App\Providers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use mysql_xdevapi\Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
        Carbon::setLocale('uk_UA.utf8');

        try {
            //раскоментировать
//            $categories = Category::where('title', '!=', Category::UNCATEGORIZES_TITLE)->get();
//            view()->share(compact('categories'));
        }catch(\Exception $ex){
//            return view('errors.error404');
        }


    }
}
