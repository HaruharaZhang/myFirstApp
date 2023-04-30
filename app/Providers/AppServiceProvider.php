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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // // Post 授权策略
        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id || $user->hasRole('admin');
        // });

        // // Comment 授权策略
        // Gate::define('update-comment', function ($user, $comment) {
        //     return $user->id === $comment->user_id || $user->hasRole('admin');
        // });
    }
}
