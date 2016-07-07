<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-07-01
 * Time: 16:24
 */

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Post;
use App\SelfCountrie;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function country($id)
    {
        $posts = SelfCountrie::find($id, ['id', 'name'])->posts->toArray();
        print_r($posts);
    }


    /**
     * 第一种方法检查权限
     * @param $id
     */
    public function update($id)
    {
        $post = Post::findOrFail($id);

        /**
         * 这是使用第一种方法检查权限App\Providers\AuthServiceProvider
         */
//        if (Gate::denies('update-post', $post)) {
//            abort(403);
//            echo 'you don\'t have pression ';
//        }

//        if (Gate::allows('update-post', $post)) {
//            echo 'YES, You Are Author';
//        } else {
//            echo 'NO, You Are Reader';
//        }

        /**
         * 这是是使用第二种方法，使用策略类
         */
//        if (Gate::denies('update', $post)) {
//        if (Gate::denies('show', $post)) {
        if (Gate::denies('delete', $post)) {
            exit('这不是原作者的');
        } else {
            exit('这是原作者的');
        }

    }

    /**
     * 第二种方法判断权限
     * 通过User 模型
     */
    public function update_2(Request $request, $id)
    {
        $post = Post::findOrFail($id);

//        if($request->user()->cannot('update-post', $post)) {
//            abort(403);
//        }

        if($request->user()->cannot('update', $post)) {
            abort(403);
        }

    }

    public function update_3($id)
    {
        $post = Post::findOrFail($id);
        /**
         * 一个策略类方法对应一个控制器上的方法
         * 在上面的 update 方法中，控制器方法和策略类方法共享同一个方法名：update。
         */
        $this->authorize('show', $post);
    }



}