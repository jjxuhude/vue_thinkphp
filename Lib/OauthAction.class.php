<?php
// 本类由系统自动生成，仅供测试用途
class OauthAction extends CommonAction {
		
		function index(){
				require("./Lib/client.php");
				//回调
				$callbackUrl = "http://vote.php/Oauth/index";
				//申请url
				$requestUrl = "http://180.169.83.34:8082/oauth/initiate";
				//验证授权url
				$authorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
				//授权码url
				$accessRequestUrl = 'http://180.169.83.34:8082/oauth/token';
				 //接口url
				$apiUrl = 'http://180.169.83.34:8082/api/rest';
				
				$Key = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
				$Secret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

				if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
					$_SESSION['state'] = 0;
				}
			
			
				//实例化
				$oauthClient = Client::init($Key, $Secret);

				 /*申请token*/
				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = Client::getRequestToken($requestUrl,$callbackUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $authorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					/*验证,写入数据库保存oauth_token*/
					$accessToken = Client::getAccessToken($accessRequestUrl,$_GET['oauth_token'],$_GET['oauth_verifier'], $_SESSION['secret']);
					 //dump($_GET);
					 dump($accessToken);
					
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
				}
				if($_SESSION['state'] == 2){
					Client::setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products";
					$productData = array(
						'type_id'           => 'simple',
						'attribute_set_id'  => 4,
						'sku'               => 'simple' . uniqid(),
						'weight'            => 1,
						'status'            => 1,
						'visibility'        => 4,
						'name'              => 'Test Oauth Name',
						'description'       => 'Test Oauth Description',
						'short_description' => 'Simple Short Description',
						'price'             => 99.95,
						'tax_class_id'      => 0,
					);
					$json=Client::call($resourceUrl,$productData, "POST");
					dump(json_decode($json));
					$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-3600,'/');
					} 
					session_destroy();
				}else{
					header('Location: http://vote.php/Oauth');
				}
				
		
		}
		
		
		function access(){
			dump("成功");
		}
		


}