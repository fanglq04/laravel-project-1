<?php
/**
 * Created by PhpStorm.
 * user: Administrator
 * Date: 2016-06-30
 * Time: 17:10
 */

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function lists()
    {
        $lists = DB::table('user')->get();
        return view('user/lists', ['lists' => $lists]);
    }


    public function show($uid){
        //以下方法只查询
//        $info = DB::table('user')->where('uid', $uid)->first();
//        var_dump($info);
//        echo $info['username'];

        //以下方式走model的getUserNameAttribute方法
        $info = User::find($uid);
        print_r($info);
//        var_dump( $info->username );

        //转换为json字符串
        echo $info->toJson();
    }

    
    public function profile($uid)
    {
        $profile = User::where('uid', $uid)->first()->hasManyInfos;
        print_r($profile);

        /**
         * 获取认证用户
         */

        $user = Auth::user();
//        print_r($user);

        /**
         * 检查是否登录
         */
        if (Auth::check())
        {
            echo 'loggin';
        } else {
            echo 'not login';
        }

    }

    /**
     * 修改用户昵称
     * @param $uid
     */
    public function profileSetNickname($uid)
    {

        $user = User::find($uid);
        $user->username = '12345';
    }

    /**
     * 地址
     * @param $uid
     */
    public function address($uid)
    {
        $address = User::where('uid', $uid)->first()->hasManyAddrs->toArray();
        print_r($address);
    }

    /**
     * 体重
     * @param $uid
     */
    public function bodys($uid)
    {
        $bodys = User::where('uid', $uid)->first()->hasManyBodys->toArray();
        print_r($bodys);
    }


    public function invoices($uid)
    {
//        $invoices = User::where('uid', $uid)->hasManyInvoices()->where('ui_title', 2)->first();
        $invoices = \App\User::find($uid)->hasManyInvoices->toArray();
        print_r($invoices);
    }


    public function updateProfile(Request $request){
        if($request->user()) {
            //loggin
            $user = $request->user();
//            print_r($user);
//            echo 'ok';
            print_r( $user->toArray() );

        } else {
            echo 'not login';
        }
    }





}