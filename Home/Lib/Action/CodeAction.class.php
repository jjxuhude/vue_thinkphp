<?php 
class CodeAction extends Action {
    public function index(){
			//require('C:\wamp\www\thinkphp\thinkphp\Extend\Vendor\Code.php');
			vendor('Code');
			$_vc = new ValidateCode();  //实例化一个对象
			$_vc->doimg();  
			$_SESSION['authnum_session'] = $_vc->getCode();//验证码保存到SESSION中
    }
	
	public function post(){
		dump($_SESSION['authnum_session']);
	}
}
?>