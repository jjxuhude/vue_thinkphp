<?php
require_once 'Oauth.class.php';

class Client{
	/**
	 * 鉴权类对象
	 * @var object
	 */
	static private $Oauth     = null;
	
	/**
	 * 初始化接口
	 + ---------------------------------------------------------------------
	 * @param string $appKey
	 * @param string $appSecret
	 + ---------------------------------------------------------------------
	 */
	static public function init($appKey, $appSecret){
		if(!$appKey || !$appSecret)
			exit('请填填写您申请的APP_KEY和APP_SELECT');
		self::$Oauth     = new Oauth1($appKey, $appSecret);
	}
	
	
	
	/**
	 * 获取request_token
	 + ---------------------------------------------------------------------
	 * @param string $url		 	申请的url
	 * @param string $callback 		授权后跳转的URL
	 + ---------------------------------------------------------------------
	 */
	static public function getRequestToken($url,$callbackUrl){
		$params = array('oauth_callback' => $callbackUrl);
		parse_str(self::$Oauth->http($url, self::$Oauth->request($params, $url)),$arr);
		return $arr;
	}
	
	/**
	 * 获取access_token
	 + ---------------------------------------------------------------------
	 * @param string $token       上一步获取到的oauth_token
	 * @param string $tokenSecret 第一步获取到的oauth_token_secret
	 + ---------------------------------------------------------------------
	 */
	static public function getAccessToken($url,$token, $verifier,$tokenSecret){
		$params = array();
		$params['oauth_token']	  = $token;
		$params['oauth_verifier'] = $verifier;
		self::$Oauth->TokenSecret = $tokenSecret;
		parse_str(self::$Oauth->http($url, self::$Oauth->request($params, $url)),$arr);
		return $arr;
	}
	
	/**
	 * 设置access_token
	 + ---------------------------------------------------------------------
	 * @param string $accessToken 获取到的 access_token
	 * @param string $tokenSecret 获取到的 access_token_secret
	 + ---------------------------------------------------------------------
	 */
	static public function setToken($accessToken, $tokenSecret){
		self::$Oauth->AccessToken = $accessToken;
		self::$Oauth->TokenSecret = $tokenSecret;
	}
	
	static public function call($url, $params, $method = 'GET'){
		//设置请求地址
		$params = self::$Oauth->request($params, $url, $method);
		return self::$Oauth->http($url, $params, $method);
	}
}