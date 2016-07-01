<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-07-01
 * Time: 16:24
 */

namespace App\Http\Controllers;

use App\SelfCountrie;

class PostsController extends Controller
{

    public function country($id)
    {
        $posts = SelfCountrie::find($id, ['id', 'name'])->posts->toArray();
        print_r($posts);
    }





}