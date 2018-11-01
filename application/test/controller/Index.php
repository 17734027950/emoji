<?php
namespace app\test\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $lists = db('content')->select();

        foreach ($lists as $key => $value) {
        	echo userTextDecode($value['name']);
        	echo "<br/>";
        }
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }


    public function add()
    {
    	if($this->request->isPost()){
    		// var_dump(input('name'));

    		$data['name'] = userTextEncode(input('name'));
    		db('content')->insertGetId($data);

    		$this->success();
    	}else{
    		return $this->fetch();
    	}

    		
    }

}
