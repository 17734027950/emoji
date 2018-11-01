<?php
namespace app\test\model;

use think\Model;

class Content extends Model
{
    public function profile()
    {
        return $this->hasOne('Profile');
    }
}
