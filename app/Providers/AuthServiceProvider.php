<?php

namespace App\Providers;

use App\Post;   //new add wjf
use App\Policies\PostPolicy;    //new add wjf
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        /**
         * 第二种方法：
         * 在这里定义策略类与模型对应关系
         */
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        /**
         * 第一种方法：
         * 在这里定义所有的权限，不过这会很臃肿，太别对于大型应用
         *
         */
//        $gate->define('update-post', function ($user, $post) {
//            return $user->id === $post->user_id;
//        });
    }
}
