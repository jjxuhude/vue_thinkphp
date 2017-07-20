<?php
// 本类由系统自动生成，仅供测试用途
class OauthAction extends Action {
		function postProduct(){
			$callbackUrl = "http://thinkphp.com/Oauth/postProduct";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products";
					$productData = json_encode(array(
						'type_id'           => 'simple',
						'attribute_set_id'  => 4,
						'sku'               => 'simple-' . uniqid(),
						'weight'            => 1,
						'status'            => 1,
						'visibility'        => 4,
						'name'              => 'Simple Product-'. uniqid(),
						'description'       => 'Simple Description',
						'short_description' => 'Simple Short Description',
						'price'             => 99.95,
						'tax_class_id'      => 0,
					));
					$headers = array('Content-Type' => 'application/json');
					$oauthClient->fetch($resourceUrl, $productData, OAUTH_HTTP_METHOD_POST, $headers);
					dump($oauthClient->getLastResponseInfo());
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
		function getProduct(){
			$callbackUrl = "http://thinkphp.com/Oauth/getProduct";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products?page=1&limit=2";
					$headers = array('Content-Type' => 'application/json; charset=utf-8');
					$oauthClient->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $headers);
					$productsList = $oauthClient->getLastResponse();
					dump(json_decode($productsList));
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
		
		function getImages(){
			$callbackUrl = "http://thinkphp.com/Oauth/getImages";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products/58/images";
					$headers = array('Content-Type' => 'application/json; charset=utf-8');
					$oauthClient->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $headers);
					$productsList = $oauthClient->getLastResponse();
					dump(json_decode($productsList));
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
				
		function getImageById(){
			$callbackUrl = "http://thinkphp.com/Oauth/getImageById";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products/58/images/60";
					$headers = array('Content-Type' => 'application/json; charset=utf-8');
					$oauthClient->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $headers);
					$productsList = $oauthClient->getLastResponse();
					dump(json_decode($productsList));
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
		
		function postImage(){
			$callbackUrl = "http://thinkphp.com/Oauth/postImage";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/products/154/images";
					for($i=1;$i<=9;$i++){
						$filename="$i.jpg";
						$imageData= base64_encode(fread(fopen($filename, "r"), filesize($filename)));
						$productData = json_encode(array(
							'file_mime_type'           => 'image/jpeg',
							'file_content'  => $imageData,
						));
						$headers = array('Content-Type' => 'application/json');
						$oauthClient->fetch($resourceUrl, $productData, OAUTH_HTTP_METHOD_POST, $headers);
					}
					dump($oauthClient->getLastResponseInfo());
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}

		
		function getSpecail(){
			$callbackUrl = "http://thinkphp.com/Oauth/getSpecail";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/specials";
					$headers = array('Content-Type' => 'application/json; charset=utf-8');
					$oauthClient->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $headers);
					$productsList = $oauthClient->getLastResponse();
					dump(json_decode($productsList));
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
		
		function postOrder(){
			$callbackUrl = "http://thinkphp.com/Oauth/postOrder";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/orders";
					$data['item1']['id']=51;
					$data['item1']['qty']=10;	
					$data['item2']['id']=153;
					$data['item2']['qty']=10;
					//$data[]=array("id"=>5,"qty"=>4);
					$productData = json_encode($data);
					$headers = array('Content-Type' => 'application/json');
					$oauthClient->fetch($resourceUrl, $productData, OAUTH_HTTP_METHOD_POST, $headers);
					dump($oauthClient->getLastResponseInfo());
					//dump($oauthClient->getLastResponse());
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}
	
	
	function getOrder(){
			$callbackUrl = "http://thinkphp.com/Oauth/getOrder";
			$temporaryCredentialsRequestUrl = "http://180.169.83.34:8082/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
			$adminAuthorizationUrl = 'http://180.169.83.34:8082/admin/oauth_authorize';
			$accessTokenRequestUrl = 'http://180.169.83.34:8082/oauth/token';
			$apiUrl = 'http://180.169.83.34:8082/api/rest';
			$consumerKey = 'pjxvuojd7znmnwqdir75ps9oqs9bzgtn';
			$consumerSecret = 'g5mnlo2lu9cmz3sqyypj6uiiwwflkb1l';

	
			if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
				$_SESSION['state'] = 0;
			}
			try {
				$authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
				$oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
				$oauthClient->enableDebug();

				if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
					$requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
					$_SESSION['secret'] = $requestToken['oauth_token_secret'];
					$_SESSION['state'] = 1;
					header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
					exit;
				} else if ($_SESSION['state'] == 1) {
					$oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
					$accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
					$_SESSION['state'] = 2;
					$_SESSION['token'] = $accessToken['oauth_token'];
					$_SESSION['secret'] = $accessToken['oauth_token_secret'];
					header('Location: ' . $callbackUrl);
					exit;
				} else {
					$oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
					$resourceUrl = "$apiUrl/orders/32";
					$headers = array('Content-Type' => 'application/json; charset=utf-8');
					$oauthClient->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $headers);
					$productsList = $oauthClient->getLastResponse();
					dump(json_decode($productsList));
				}
			} catch (OAuthException $e) {
				dump($e);
			}
		
		}	
		
}