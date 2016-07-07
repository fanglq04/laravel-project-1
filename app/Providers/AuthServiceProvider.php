<?php

namespace App\Providers;

use App\Policies\TaskPolicy;
use App\Post;   //new add wjf
use App\Policies\PostPolicy;    //new add wjf
use App\Task;
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

        //我们需要关联Task模型和TaskPolicy，注册下
        //注册后会告知Laravel无论何时我们尝试授权动作到Task实例时该使用哪个策略类进行判断
        Task::class => TaskPolicy::class,
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
