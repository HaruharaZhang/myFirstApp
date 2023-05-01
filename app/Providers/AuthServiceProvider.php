<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Common;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->registerPolicies();

        // Post 授权策略
        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id || $user->name === 'Administrator';
        });

        // Comment 授权策略
        Gate::define('update-comment', function ($user, $comment) {
            return $user->id === $comment->user_id || $user->name === 'Administrator';
        });

        Gate::define('delete-comment', function (User $user, Common $comment) {
            return $user->id === $comment->user_id || $user->name === 'Administrator';
        });
    }
}
