<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfCountrie extends Model
{
    /**
     * 获取指定国家所有文章
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     * 第一个传递到hasManyThrough方法的参数是最终我们希望访问的模型的名称，第二个参数是中间模型名称。
     * 第三个参数是中间模型的外键名，第四个参数是最终模型的外键名。
     */
    public function posts()
    {
        return $this->hasManyThrough('App\SelfPost', 'App\SelfUser', 'country_id', 'user_id');
    }
}
