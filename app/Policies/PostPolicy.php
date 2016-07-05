<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 判断给定文章是否可以被给定用户更新
     * @param User $user
     * @param Post $post
     * @return bool
     *
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    /**
     * 指定用户是否被给定用户查看
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function show(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    /**
     * 指定文章是否被给定用户删除
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function deltete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


}
