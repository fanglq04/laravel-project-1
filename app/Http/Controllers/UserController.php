<?php
/**
 * Created by PhpStorm.
 * user: Administrator
 * Date: 2016-06-30
 * Time: 17:10
 */

namespace App\Http\Controllers;

use DB;
use App\User;

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
        var_dump($info);
        var_dump( $info->username );

    }

    
    public function profile($uid)
    {
        $profile = User::where('uid', $uid)->first()->hasManyInfos;
        print_r($profile);
    }


    public function address($uid)
    {
        $address = User::where('uid', $uid)->first()->hasManyAddrs->toArray();
        print_r($address);
    }

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




}