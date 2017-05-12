<?php

namespace App\HomeModel;

use Illuminate\Database\Eloquent\Model;

class yws_user extends Model
{
    //
    protected $table = 'yws_users';
    protected $primaryKey = 'id';
    protected $fillable=[
        'username','password','phone','status'
    ];

    public function hasOneUserInfo()
    {
        return $this->hasone('App\Home\userInfo');
    }

}
