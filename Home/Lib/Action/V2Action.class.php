<?php
// 本类由系统自动生成，仅供测试用途
class V2Action extends Action {

	function _initialize(){
		header('Content-Type:text/html;Charset=utf-8;');
	}


	function new_glamulet(){
			$proxy = new SoapClient('http://new.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '100000148');
			foreach($result->items as $item){
				dump( unserialize($item->product_options));
			}
	}
	function au(){
			$proxy = new SoapClient('http://www.hairextensionsonsale.com.au/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '600029549');
			dump($result);
	}

	function dede(){
			$proxy = new SoapClient('http://www.hairextensionsale.de/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '7910001504');
			dump($result);
	}	
	function us(){
			$proxy = new SoapClient('http://www.hairextensionsale.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', '12345qazwsx'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '300090611');
			dump($result);
	}
	
	function uk(){
			$proxy = new SoapClient('http://www.hairextensionsale.co.uk/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '9700040027');
			dump($result);
	}	
	function ca(){
			$proxy = new SoapClient('http://www.hairextensionsale.ca/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '9000021094');
			dump($result);
	}
	
	function m_ca(){
			$proxy = new SoapClient('http://m.hairextensionsale.ca/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '1500002343');
			dump($result);
	}

	
	function ie(){
			$proxy = new SoapClient('http://www.hairextensionsale.ie/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '8600017534');
			dump($result);
	}
	
	function who(){
			$proxy = new SoapClient('http://wholesale.hairextensionsale.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '7700023286');
			dump($result);
	}
	function folihair_ca(){
			$proxy = new SoapClient('http://www.folihair.ca/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '4100004525');
			dump($result);
	}
	function eu(){
			$proxy = new SoapClient('http://www.hairextensionsale.eu/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '7900010092');
			dump($result);
	}	
	function za(){
			$proxy = new SoapClient('http://www.hairextensionsale.co.za/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '8800017086');
			dump($result);
	}
	function folihair_au(){
			$proxy = new SoapClient('http://www.folihair.us/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '200002782');
			dump($result);
	}

	function de(){
			$proxy = new SoapClient('http://www.glamulet.de/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5700017939');
			dump($result);
	}	
	
	function bellalabs(){
			$proxy = new SoapClient('http://www.bellalabs.uk.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '225200001238');
			dump($result);
	}
	
	
	function hairextensionsonsale(){
			$proxy = new SoapClient('http://www.hairextensionsonsale.co.uk/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '4500015360');
			dump($result);
	}
	
	function hairup(){
			$proxy = new SoapClient('http://www.hairup.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '225600001492');
			dump($result);
	}
	
	function hairextensionsonsale_ca(){
			$proxy = new SoapClient('http://www.hairextensionsonsale.ca/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '3500002045');
			dump($result);
	}
	function remyhairextensionshop(){
			$proxy = new SoapClient('http://www.remyhairextensionshop.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '1600092183');
			dump($result);
	}
	
	function humanhairextensionsale(){
			$proxy = new SoapClient('http://www.humanhairextensionsale.ca/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '3300003303');
			dump($result);
	}
	function folihair_co_uk(){
			$proxy = new SoapClient('http://www.folihair.co.uk/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '4200005683');
			dump($result);
	}
	
	function kinghair(){
			$proxy = new SoapClient('http://www.kinghair.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '225500001834');
			dump($result);
	}
	function hairextensionsale_net(){
			$proxy = new SoapClient('http://www.hairextensionsale.net/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '225700003406');
			dump($result);
	}
	
	function glamulet1(){
			$proxy = new SoapClient('http://www1.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5000068250');
			dump($result);
	}
	function glamulet(){
			$proxy = new SoapClient('http://www.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5000068250');
			dump($result);
	}
	function coza(){
			$proxy = new SoapClient('http://www.glamulet.co.za/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5100044110');
			dump($result);
	}

	function glamulet_hk(){
			$proxy = new SoapClient('http://www.glamulet.hk/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '6500000132');
			dump($result);
	}
	
	function glamulet_vn(){
			$proxy = new SoapClient('http://www.glamulet.vn/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '2400008489');//2400008489 2400008491
			dump($result);
	}
	
	function testapi(){
			$proxy = new SoapClient('http://www1.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5000012389');//800000779,5000012389
			dump($result);
	}
	
	function wwworg(){
			$proxy = new SoapClient('http://wwworg.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '5000001228');
			dump($result);
	}
	
	function coco(){
			$proxy = new SoapClient('http://www.cocoextensions.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '7920000001');
			dump($result);
	}

	function comment(){
			$proxy = new SoapClient('http://org.glamulet.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderAddComment($sessionId, '5000019108','processing','1111111',true);
			dump($result);
	}
	
	function cn(){
		$proxy = new SoapClient('http://www.glamulet.cn/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '100000101');
			dump($result);
	}
	
	function tw(){
		$proxy = new SoapClient('http://www.glamulet.tw/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '6500046521 ');
			dump($result);
	}
	
	function export(){
			$proxy = new SoapClient('http://www.hairextensionsale.co.uk/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
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
			
			//$result = $proxy->salesOrderInfo($sessionId, '9700040027');
			//dump($result);
	}

}

