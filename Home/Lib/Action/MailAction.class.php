<?php



class MailAction extends Action
{
    public function indexAction(){
		$member=new member();
		$rows=$member->fetchAll()->toArray();
		dump($rows);
		$this->assign('rows',$rows);
		$this->assign('xu','徐华德');
		$this->assign('time',time());
		$this->display('index');
    }
    
    function userAction(){
    	$param=$this->_getAllParams()  ;
   		dump($param);
   		dump('我是用户action');exit;
		
    }
    
    function error404Action(){
    	
    	die('没有此页面');
    }

	//gmail邮箱
	function send1(){
		
			require_once 'Zend/Mail.php';
			require_once 'Zend/Mail/Transport/Smtp.php';
			require_once 'Zend/Mail/Protocol/Smtp.php';
			 $host1="smtp.gmail.com";
		     $config1 = array(
				'ssl' => 'ssl',   //Zend_Mail_Protocol_Smtp_Auth_Login父类的构造方法中设置
				'port' => 465,
				'auth' => 'login',  //类名
				'username' => 'jjxuhuade@gmail.com',  //Zend_Mail_Protocol_Smtp_Auth_Login
				'password' => 'xuhuadejacky'		  //Zend_Mail_Protocol_Smtp_Auth_Login
       		 );
			
		
			//当前脚本程序中所有使用Zend_Mail::send()发送的邮件，都将以SMTP方式传送。
			$init_mail = new Zend_Mail_Transport_Smtp($host1,$config1);

			//		Zend_Mail::setDefaultTransport($init_mail);
			
			
			//这里就是发送邮件的过程了
			$mail = new Zend_Mail('UTF-8');
			$result = $mail->addTo("jjxuhuade@163.com") //这个是收件人的电邮地址
						   ->setFrom("webpost@kidsmusic.com.cn") //这个是发件人的电邮地址，也就是你电邮账户
						   ->setSubject('=?utf-8?B?' . base64_encode("zend framework邮件2") . '?=') //这个是邮件的主旨
						   ->setBodyText("111111") //邮件主体
						   ->send($init_mail); //最后发送邮件
		}
		
		//163邮箱
		function send2(){
		
			require_once 'Zend/Mail.php';
			require_once 'Zend/Mail/Transport/Smtp.php';
			require_once 'Zend/Mail/Protocol/Smtp.php';
			
			$config = array('auth' => 'login',
							'username' => 'jjxuhuade@163.com',
							'password' => '771125');
			 
			$transport = new Zend_Mail_Transport_Smtp('smtp.163.com', $config);
			 
			$mail = new Zend_Mail('UTF-8');
			$mail->setBodyText('This is the text of the mail.');
			$mail->setFrom('jjxuhuade@163.com', 'Some Sender');
			$mail->addTo('460162719@qq.com', 'Some Recipient');
			$mail->setSubject('TestSubject');
			$mail->send($transport);
		}
		
		//qq邮箱
		function send3(){
		
			require_once 'Zend/Mail.php';
			require_once 'Zend/Mail/Transport/Smtp.php';
			require_once 'Zend/Mail/Protocol/Smtp.php';
			
			$config = array('auth' => 'login',
							'username' => '460162719@qq.com',
							'password' => '!zhouxiaoqing');
			 
			$transport = new Zend_Mail_Transport_Smtp('smtp.qq.com', $config);
			 
			$mail = new Zend_Mail('UTF-8');
			$mail->setBodyText('地对地导弹.');
			$mail->setFrom('460162719@qq.com', '发送者·');
			$mail->addTo('jjxuhuade@163.com', '接收者');
			$mail->setSubject('TestSubject');
			$mail->send($transport);
		}
		

    


}

