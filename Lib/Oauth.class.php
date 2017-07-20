<?php
// +----------------------------------------------------------------------
// | TOPThink [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://topthink.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: zuojiazi <zuojiazi@vip.qq.com>
// +----------------------------------------------------------------------
// | 2012-2-20  Oauth.class.php
// +----------------------------------------------------------------------

class Oauth1{
	/**
	 * oauth版本
	 * @var string
	 */
	private $Version = '1.0';
	
	/**
	 * 签名方法
	 * @var string
	 */
	private $Method  = 'HMAC-SHA1';
	
	/**
	 * app_key
	 * @var string
	 */
	private $AppKey = '';
	
	/**
	 * app_secret
	 * @var string
	 */
	private $AppSecret   = '';
	
	/**
	 * token_secret
	 * @var string
	 */
	private $TokenSecret = '';
	
	/**
	 * access_token
	 * @var string
	 */
	private $AccessToken = '';
	
	/**
	 * 构造方法，传入参数app_secret
	 +------------------------------------------------------------------------------
	 * @param string $appSecret
	 +------------------------------------------------------------------------------
	 */
	public function __construct($appKey, $appSecret){
		$this->AppKey      = $appKey;
		$this->AppSecret   = $appSecret;
	}
	
	/**
	 * 魔术方法，设置类的私有属性
	 +------------------------------------------------------------------------------
	 * @param string $name
	 * @param string $value
	 +------------------------------------------------------------------------------
	 */
	public function __set($name, $value){
		$this->$name = $value;
	}
	
	/**
	 * 请求签名方法
	 +------------------------------------------------------------------------------
	 * @param  string  $method  请求方法GET/POST
	 * @param  string  $url     请求URL
	 * @param  array   $params  请求参数
	 * @return string $sign     生成签名
	 +------------------------------------------------------------------------------
	 */
	public function sign($method, $url, $params){
		//对请求参数进行排序
		ksort($params, SORT_STRING);
		
		//签名参数
		$signs['method'] = strtoupper($method); //请求方法转大写
		$signs['url']    = urlencode($url); //编码URL
		$signs['param']  = str_replace(array('%257E', '%2B'), array('~', '%2520'), urlencode(http_build_query($params)));//编码参数
		
		//签名密钥
		$key = array($this->AppSecret, $this->TokenSecret);
		//生成签名
		$sign = base64_encode(hash_hmac('sha1', implode('&', $signs), implode('&', $key), true));
		return $sign;
	}
	
	/**
	 * 获取请求参数
	 + ---------------------------------------------------------------------
	 * @param  array  $params  额外的请求参数
	 * @param  string $url     请求的URL
	 * @param  string $method  请求方法GET/POST
	 * @return array           完整的请求参数
	 + ---------------------------------------------------------------------
	 */
	public function request($params, $url, $method = 'GET'){

		$_params = array(
			'oauth_consumer_key'     => $this->AppKey,
			'oauth_nonce'            => md5(mt_rand(1, 100000) . microtime(true)),
			'oauth_signature_method' => $this->Method,
			'oauth_timestamp'        => time(),
			'oauth_version'          => $this->Version,
		);
		if($this->AccessToken)
			$_params['oauth_token'] = $this->AccessToken;
		$params = array_merge($_params, $params);
		//签名
		
		$params['oauth_signature'] = $this->sign($method, $url, $params);
		return $params;
	}
	
	/**
	 * 发送HTTP请求方法，目前只支持CURL发送请求
	 +------------------------------------------------------------------------------
	 * @param  string $url    请求URL
	 * @param  array  $params 请求参数
	 * @param  string $method 请求方法GET/POST
	 * @return array  $data   响应数据
	 +------------------------------------------------------------------------------
	 */
	public function http($url, $params, $method = 'GET'){
		//var_dump($url);
		//var_dump($params);
		
		$vars = http_build_query($params);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		switch(strtoupper($method)){
			case 'GET':
				curl_setopt($ch, CURLOPT_URL, $url . '?' . $vars);
				break;
			case 'POST':
				$header[]="Content-Type: application/json";
				$header[]="Authorization: Oauth " . base64_encode("jjxuhuade:111111q");
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
				
				break;
			default:
				exit('不支持的请求方式！');
				
		} 
		$data  = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);
		if($error) 
			exit('请求发生错误：' . $error);
		return  $data;
	}
}