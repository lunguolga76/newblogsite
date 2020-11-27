<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrap();
        view()->composer(['layouts.sidebar','layouts.navbar','layouts.footer'], function($view){
            if(Cache::has('cats')){
                $cats=Cache::get('cats');
            }else{
                $cats=Category::withCount('posts')->orderBy('posts_count','desc')->get();
                Cache::put('cats',$cats,30);
            }
            $view->with('recent_posts',Post::orderby('created_at','desc')->limit(4)->get());
            $view->with('popular_posts',Post::orderby('views','desc')->limit(4)->get());

            $view->with('cats',$cats);

        });

    }

}
