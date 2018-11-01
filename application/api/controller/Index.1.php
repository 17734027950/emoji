<?php
namespace app\api\controller;

use GuzzleHttp\Client;

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

		$response = $client->get('http://httpbin.org/get');
		$response = $client->delete('http://httpbin.org/delete');
		$response = $client->head('http://httpbin.org/get');
		$response = $client->options('http://httpbin.org/get');
		$response = $client->patch('http://httpbin.org/patch');
		$response = $client->post('http://httpbin.org/post');
		$response = $client->put('http://httpbin.org/put');

		$response = $client->request('GET', 'http://httpbin.org?foo=bar');


		$client->request('GET', 'http://httpbin.org', [
		    'query' => ['foo' => 'bar']
		]);


		$response = $client->request('POST', 'http://httpbin.org/post', [
		    'form_params' => [
		        'field_name' => 'abc',
		        'other_field' => '123',
		        'nested_field' => [
		            'nested' => 'hello'
		        ]
		    ]
		]);



		/* get 测试 */
		$response_get = $client->request('GET', 'http://httpbin.org', [
		    'query' => ['foo' => 'bar']
		]);

		echo $body = $response_get->getBody();


       	// return json(['msg'=>'index_index']);
    }
}
