<?php
// 本类由系统自动生成，仅供测试用途
class FrAction extends Action {
	private $client;

	function __construct(){
		$this->client = new SoapClient('http://new.hairextensionsale.fr/api/soap/?wsdl');
	}
	
	function login(){
		$session = $this->client->login('hairextension', 'hairextension');
		return $session;
	}
	
	//1.创建货运订单
	function createShipping(){
		$session=$this->login();
		$result=$this->client->call($session,'order_shipment.create',array('9800015113'));
		dump($result);//货运单号
	}
	
	//2.创建跟踪单号
	function createTrace(){
		$session=$this->login();
		$result=$this->client->call($session,'sales_order_shipment.addTrack',
			array('shipmentIncrementId' => '300000001', 'carrier' => 'custom', 'title' => 'ups11', 'trackNumber' => '444444444')
		);
		dump($result);
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

