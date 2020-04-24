<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Carbon 中文化配置
        \Carbon\Carbon::setLocale('zh');

        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class); #添加了吗？
        \App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        $cate=Category::all();

        View::share('cate', $cate);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}
