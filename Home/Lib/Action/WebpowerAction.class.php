<?php
// 本类由系统自动生成，仅供测试用途
class WebpowerAction extends Action {
	
	function mail(){
			ini_set('soap.wsdl_cache_enabled','0');
			$client = new SoapClient('http://hairup.dmdelivery.com/x/soap-v4.1/wsdl.php',array('encoding'=>'utf-8', 'features'=>SOAP_SINGLE_ELEMENT_ARRAYS));
			$login = array('username' => 'Jack', 'password' => 'Rryhu8nf<' );
			
			//收集名单
			$result = $client->addRecipientsSendMailing(
			
				$login,
				6,//活动id
				336,//邮件id
				array(81), //用户组id		
				array(
				array(
					array('name'=>'email','value'=>'460162719@qq.com'),
					array('name'=>'name','value'=>'1111'),
			   ) ),
				true,
				true
			);
			dump($result);
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/*
			
			exit;
			//发送邮件
			$result = $client->sendMailing(
				$login,
				6,		//活动id
				336,    //邮件id
				ture,
				"jjxuhuade@163.com",
				array(81),  //用户组id
				"",
				"",
				"",
				""
			   );
		    */
	
	}

}


