<?php
// 本类由系统自动生成，仅供测试用途
class Api2Action extends Action {
	
	function getToken($_username,$_password,$_domain){
		$data = array("username" => $_username, "password" => $_password);
		$data_string = json_encode($data);
		$_token_url=$_domain."/index.php/rest/V1/integration/admin/token";
		$ch = curl_init($_token_url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		//$result = curl_exec($ch);
		//$_token=(string) json_decode($result);
		$_token="jwq4cgs96lneqtw5vb5jwfdi1kehvs6u";
		$opts = array(
			'http'=>array(
			'header' => 'Authorization: Bearer '.$_token
			)
		);
		$params=array (
			'encoding' => 'UTF-8', 
			'verifypeer' => false, 
			'verifyhost' => false, 
			'soap_version' => SOAP_1_2, 
			'trace' => 1, 'exceptions' => 1, 
			"connection_timeout" => 180, 
			'stream_context' => stream_context_create($opts) 
		);
		return $params;
	}

	//dump($client->__getFunctions());
	//dump($client->__getTypes());
	function index(){
		$_username='admin';
		$_password='111111q';
		$_domain="http://mage.dev";
		$api = $_domain.'/soap/default?wsdl&services=customerCustomerRepositoryV1';
		$params=$this->getToken($_username,$_password,$_domain);
        $client = new SoapClient ( $api, $params );
        $result=$client->customerCustomerRepositoryV1GetById(array('customerId'=>1));
        dump($result);
	}






	



}

