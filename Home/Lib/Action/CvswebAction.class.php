<?php
// 本类由系统自动生成，仅供测试用途
class CvswebAction extends Action {

	function _initialize(){
		header('Content-Type:text/html;Charset=utf-8;');
	}

	/**
	  0 => string 'SoapClient' (length=10)
	  1 => string '__call' (length=6)
	  2 => string '__soapCall' (length=10)
	  3 => string '__getLastRequest' (length=16)
	  4 => string '__getLastResponse' (length=17)
	  5 => string '__getLastRequestHeaders' (length=23)
	  6 => string '__getLastResponseHeaders' (length=24)
	  7 => string '__getFunctions' (length=14)
	  8 => string '__getTypes' (length=10)
	  9 => string '__doRequest' (length=11)
	  10 => string '__setCookie' (length=11)
	  11 => string '__setLocation' (length=13)
	  12 => string '__setSoapHeaders' (length=16)
	**/
	
	
	function index(){
			$proxy = new SoapClient('http://cvsweb.cvs.com.tw/webservice/service.asmx?wsdl'); // TODO : change url
			dump( get_class_methods($proxy)  );

	}
	
	
	
	
	function us(){
			$proxy = new SoapClient('http://www.hairextensionsale.com/api/v2_soap/?wsdl'); // TODO : change url
			$sessionId = $proxy->login('hairextension', 'hairextension'); // TODO : change login and pwd if necessary
			$result = $proxy->salesOrderInfo($sessionId, '300087675');
			dump($result);
			//dump( get_class_methods($proxy)  );
	}



}

