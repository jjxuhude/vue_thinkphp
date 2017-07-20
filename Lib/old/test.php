<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.zjzit.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: zuojiazi <zuojiazi@vip.qq.com>
// +----------------------------------------------------------------------
// | test.php 2012-2-27
// +----------------------------------------------------------------------

define('APP_KEY', '801104376'); 							//您在腾讯微博申请的应用APP_KEY
define('APP_SELECT', 'e55217100605de55d3de799d1772dee2');   //您在腾讯微博申请的应用APP_SELECT
define('CALLBACK','http://king.com');

require_once '../TencentWeiBo.class.php';
session_start();

//初始化腾讯微博开放接口
TencentWeiBo::init(APP_KEY, APP_SELECT);

if(empty($_SESSION['oauth_token_secret']) && empty($_SESSION['think_access_token'])){
	$requestToken = TencentWeiBo::getRequestToken(CALLBACK);//获取请求
	$_SESSION['oauth_token_secret'] = $requestToken['oauth_token_secret'];
	header('Location: http://open.t.qq.com/cgi-bin/authorize?oauth_token=' . $requestToken['oauth_token']);//跳转登陆页面，同时把oauth_token传过去
} elseif (empty($_SESSION['think_access_token'])){//下面callback页面处理
	$accessToken = TencentWeiBo::getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier'], $_SESSION['oauth_token_secret']);
	unset($_SESSION['oauth_token_secret']);
	$_SESSION['think_access_token'] = $accessToken;
}

//设置access_token
TencentWeiBo::setAccessToken($_SESSION['think_access_token']['oauth_token'], $_SESSION['think_access_token']['oauth_token_secret']);


//获取一条微博数据
$data = TencentWeiBo::call('t/add', array('format' => 'json', 'content' => '3.0调试模式和部署模式的性能比较 - http://www.thinkphp.cn/blog-44.html - ThinkPHP开源PHP开发框架', 'clientip' => '116.233.144.255'), 'POST');
print_r(json_decode($data, true));