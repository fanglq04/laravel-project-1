<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $table = 'user';

    protected $primaryKey = 'uid';
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


    public function getUserNameAttribute($value)
    {
        return ucfirst($value);
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
