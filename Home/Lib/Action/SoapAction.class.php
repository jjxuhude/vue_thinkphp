<?php
// 本类由系统自动生成，仅供测试用途
class SoapAction extends Action {
	private $client;

	function __construct(){
		$this->client = new SoapClient('http://www.hairextensionsonsale.co.uk/api/soap/?wsdl');
	}
	
	function login(){
		$session = $this->client->login('hairextension', 'hairextension');
		return $session;
	}

	function getOrderById(){
		$session=$this->login();
		$result = $this->client->call($session, 'order.info',"9700014300");
		dump($result);
	}

	function eq(){
		$client = new SoapClient('http://www.hairextensionsonsale.co.uk/api/v2_soap/?wsdl');

		$session = $client->login('hairextension', 'hairextension');
		$filter = array('filter' => array(array('key' => 'order_id', 'value' => '17338')));
		$result = $client->salesOrderList($session, $filter);

		var_dump ($result);
	}
	function gteq(){
		$client = new SoapClient('http://www.hairextensionsonsale.co.uk/api/v2_soap/?wsdl');

		$session = $client->login('hairextension', 'hairextension');
		$filter = array(
			'complex_filter' => array(
                array(
                    'key' => 'order_id',
                    'value' => array(
                        'key' => 'gteq',
                        'value' => '17338'
                    )
                )
			)
		);
		$result = $client->salesOrderList($session, $filter);

		dump ($result);
	}
	
	function getOrderList(){
		$session=$this->login();
		$result = $this->client->call($session, 'order.list');
		dump($result);
	}
	
	function category(){
		$session=$this->login();
		$result = $this->client->call($session, 'category.tree');
		dump($result);
	}
	
	
	function wsi(){
		$proxy = new SoapClient('http://codoshair.com/api/v2_soap/?wsdl'); 

		$sessionId = $proxy->login((object)array('username' => 'hairextension', 'apiKey' => 'hairextension')); 
		 
		$result = $proxy->salesOrderShipmentGetCarriers((object)array('sessionId' => $sessionId->result, 'orderIncrementId' => '100000026'));   
		dump($result->result);
	}
	
	function remy(){
		$proxy = new SoapClient('http://new.hairextensionsale.co.uk/api/v2_soap/?wsdl'); 
		$sessionId = $proxy->login((object)array('username' => 'hairextension', 'apiKey' => 'hairextension')); 
		$result = $proxy->salesOrderShipmentGetCarriers((object)array('sessionId' => $sessionId->result, 'orderIncrementId' => '9700014568'));   
		dump($result->result);
	}
	
	
	
}

