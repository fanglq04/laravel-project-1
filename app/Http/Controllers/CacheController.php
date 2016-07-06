<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-07-06
 * Time: 10:13
 */

namespace App\Http\Controllers;

use Redis;

class CacheController extends Controller
{

    public function cache_1()
    {
        Redis::set('name', 'wangjiafang');
        echo Redis::get('name');
    }
}