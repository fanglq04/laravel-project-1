<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBody extends Model
{
    //
    protected $table = 'user_body';

    protected $id = 'ub_id';


    public function belongsToUser()
    {
        return $this->belongsTo('App\User');
    }
}
