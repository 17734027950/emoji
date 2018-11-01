<?php

namespace app\api\controller\v2;

use think\Controller;
use think\Request;

class Apiver extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function read($id)
    {
        // echo ' v1->apiver  '.$id;
        // return json(['msg'=>'index_index']);
        return json(['id'=>$id,'msg'=>'v2']);
    }
}