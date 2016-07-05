<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /**
     * 指定表名
     * @var string
     */
//    protected $table = 'user';

//    protected $primaryKey = 'uid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 白名单，仅显示字段
     * @var array
     */
    protected $visible = [
//        'uid', 'username', 'phone', 'email'
    ];

    /**
     * 追加到模型数组表单的访问器
     * @var array
     */
    protected $appends = [
        'is_admin',
    ];

    /**
     * 应该被调整为日期的属性
     * @var array
     */
    protected $dates = [
        'create_at', 'updated_at',
    ];

    /**
     * 模型日期的存储格式
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 获取用户的名字
     * @param $value
     * @return string
     */
    public function getUserNameAttribute($value)
    {
        return ucfirst($value);
    }


    /**
     * 设置用户的名字
     * @param $value
     * @return string
     */
    public function setUserNameAttribute($value)
    {
//        exit($value);
        $this->attributes['username'] = trim($value);
    }


    /**
     * 追加表中不存在的字段的值到输出中
     * @return string
     */
    public function getIsAdminAttribute()
    {
        return $this->attributes['admin'] = 'YES';
    }


    public function hasManyInfos()
    {
        return $this->hasOne('App\UserInfo', 'uid');
    }



    public function hasManyAddrs()
    {
        return $this->hasMany('App\UserAddr', 'uid');
    }



    public function hasManyBodys()
    {
        return $this->hasMany('App\UserBody', 'ub_uid');
    }



    public function hasManyInvoices()
    {
        return $this->hasMany('App\UserInvoice', 'ui_uid');
    }


}
