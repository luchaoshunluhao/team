<?php

namespace App\Model;

//引入trait的空间
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //基本定义
    protected $table = 'admin';
    protected $hidden = ['remember_token'];
    //使用trait
    use Authenticatable;
    //把框架密码验证的默认password改成数据库中密码字段userpwd
    public function getAuthPassword()
    {
        return $this->userpwd;
    }

}
