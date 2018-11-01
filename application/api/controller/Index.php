<?php
namespace app\api\controller;

use GuzzleHttp\Client;
use think\facade\Request;

class Index
{
    public function index()
    {

    	$client = new Client([
		    // Base URI is used with relative requests
		    'base_uri' => 'http://httpbin.org',
		    // You can set any number of default request options.
		    'timeout'  => 2.0,
		    // ssl验证 跳过
		    'verify'   => false,
		]);

		/* 请求基础路径 */
		$base_url = request()->domain().request()->root();

		/* get 测试 */
		$response_get = $client->request('GET', $base_url.'/api/demo/testget', [
		    'query' => ['foo' => 'bar']
		]);

		echo $body = $response_get->getBody();

		echo '<hr>';

		/* post 测试 */
		$response_post = $client->request('POST', $base_url.'/api/demo/testpost', [
		    'form_params' => [
		        'field_name' => 'abc',
		        'other_field' => '123',
		        'nested_field' => [
		            'nested' => 'hello'
		        ]
		    ]
		]);

		echo $body = $response_post->getBody();




       	// return json(['msg'=>'index_index']);
    }
}
