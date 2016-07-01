<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddr extends Model
{
    //

    protected $table = 'user_addr';
    
    public function belongsToUser()
    {
        return $this->belongsTo('App\User');
    }
}
