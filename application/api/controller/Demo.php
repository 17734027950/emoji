<?php
namespace app\api\controller;

use think\Controller;
use think\facade\Request;

class Demo extends Controller
{
    public function index()
    {
    	var_dump(request()->param());
    	var_dump(request()->isGet());
    	die;
       	return json(['msg'=>'index_index']);
    }


    public function testget()
    {
    	if(request()->isGet()){
    		$json['code'] = 1;
    		$json['msg']  = 'success';
    		$json['data'] = request()->param();
    		return json($json);
    	}else{
            return json(array('code'=>0,'msg'=>'请使用GET请求'));
        }
    }
    public function testpost()
    {
    	if(request()->isPost()){
    		$json['code'] = 1;
    		$json['msg']  = 'success';
    		$json['data'] = request()->param();
    		return json($json);
    	}else{
            return json(array('code'=>0,'msg'=>'请使用POST请求'));
        }
    }
}
