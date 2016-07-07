<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-07-06
 * Time: 10:54
 */

namespace App\Http\Controllers;


use DB;
use Log;
use Crypt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudyController extends Controller
{

    public function collect_1()
    {
        $array = [1, 2, 3];
        $totals = collect($array)->all();
        print_r( $totals );

        $avg = collect($array)->avg();
        var_dump($avg);

        $collection = collect([
            ['name' => 'JavaScript: The Good Parts', 'pages' => 176],
            ['name' => 'JavaScript: The Definitive Guide', 'pages' => 1096],]);

        echo $collection->avg('pages');

        /**
         * chunk 方法将一个集合分割成多个小尺寸的小集合
         */
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $chunks = $collection->chunk(2);
        $r = $chunks->toArray();
        echo "<pre>";
        print_r($r);

        /**
         * collapse 方法将一个多维数组集合收缩成一个一维数组：
         */
        $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        $collapsed = $collection->collapse();
        $r = $collapsed->all();
        print_r($r);


        $collection = collect(['Chair', 'Desk', 'Wanhg', 'Make']);
        $zipped = $collection->zip([100, 200, 300, 400]);
        $r = $zipped->all();
        print_r($r);

    }



    public function storeSecret()
    {
//        Log::info('Wangjiafang');

        //加密
        echo bcrypt('123456');
        //解密
        echo Crypt::decrypt('eyJpdiI6IjRjdHkyZGZaSHFCRllIUWtjVEF0enc9PSIsInZhbHVlIjoiYnlmMXFlb1o0M2w0Qnk1MUVvRGlcL0E9PSIsIm1hYyI6ImZlODEzMTU4MTBiMGNjNDdmMWEwN2U0NWIwZTE0MWY5YzI3NDliNDUxZDc5YTM1M2MxYTVhZWRmMDAyODE4NGQifQ');
    }

    public function arrayHelper()
    {
//        $array = [100, 200, 300];
//        $value = array_first($array, function ($key, $value) {
//            return $value >= 150;});
//        print_r($value);

//        $array = ['products' => ['desk' => ['price' => 100]]];

//        $r = array_forget($array, 'products.desk');
//        print_r($r);

//        $array = ['products' => ['desk' => ['price' => 100]]];
//        $value = array_get($array, 'products.desk');
//        print_r($value);

        $array = ['name' => 'Desk', 'price' => 100, 'orders' => 10];
        $value = array_only($array, ['orders', 'name']);
        print_r($value);

    }


    public function funHelper()
    {
//        $path = app_path('Http/Controllers/Controller.php');
//        $path = base_path();
//        $path = config_path();
//        $path = database_path();
//        $path = public_path();
//        $path = storage_path('app/file.txt');
//        echo $path;

//        echo e('<html>foo</html>');
//        echo $string = str_random(40);
//        echo action('HomeController@index');

//        echo $url = route('show2');

        $user = auth()->user();
        print_r($user);
    }

    public function time()
    {
        printf("NOW:%s", Carbon::now());
//        echo Carbon::createFromDate(2016,12,25);
//        echo Carbon::yesterday();
//        var_dump( Carbon::subYears(2016) );
//        echo Carbon::today();
        echo Carbon::tomorrow();
    }

    public function pages()
    {
        $users = DB::table('users')->paginate(1);

//        print_r($users);
        
        return view('study/pages', ['users' => $users]);
    }


    public function sessions(Request $request)
    {
        //获取单个session
        $value = $request->session()->get('info', function () {
            //code
        });

        //获取所有session
//        $value = $request->session()->all();
//        var_dump($value);

        //判断是否存在session
//        if ($request->session()->has('info')) {
//            echo '123';
//        } else {
//            echo 'not ';
//        }


//        $request->session()->put('s1', 'wangjiafang');
//        echo $request->session()->get('s1');

        $request->session()->push('user.name', 'wangjiafang-2');
        $request->session()->push('user.age', '33');
        $value = $request->session()->get('user');
        echo "<pre>";
        var_dump($value);
        $value = $request->session()->pull('user');
        var_dump($value);

        $value = $request->session()->flush();
        var_dump($value);

        echo $request->session()->regenerate();
        echo $request->session()->regenerateToken();

    }


}