<?php
// 本类由系统自动生成，仅供测试用途
class M2Action extends Action {
	
	public $_token;
	public $_username='admin';
	public $_password='111111q';
	public $_api_url='http://mage.dev/index.php/rest/V1/integration/admin/token';
	
	function _initialize(){
		$data = array("username" => $this->_username, "password" => $this->_password);
		$data_string = json_encode($data);
		$ch = curl_init($this->_api_url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);
		 $this->_token=(string)$result;
	}


	function index(){
		
		$token=$this->_token;
		$opts = array(
			'http'=>array(
			'header' => 'Authorization: Bearer '.$token
			)
		);
		$wssdlUrl = 'http://magento.ll/soap/default?wsdl=1&services=testModule1AllSoapAndRestV1';
		$serviceArgs = array("id"=>1);
		 
		$soapClient = new Zend\Soap\Client($wsdlUrl);
		$soapClient->setSoapVersion(SOAP_1_2);
		 
		$context = stream_context_create($opts);
		$soapClient->setStreamContext($context);
		 
		$soapResponse = $this->_getSoapClient($serviceInfo)->testModule1AllSoapAndRestV1Item($serviceArgs);
		
	}






	



}

