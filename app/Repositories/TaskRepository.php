<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-07-07
 * Time: 15:49
 */
namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{

    /**
     * 根据user取列表
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}