<?php 
class CodeAction extends Action {
    public function index(){
			//require('C:\wamp\www\thinkphp\thinkphp\Extend\Vendor\Code.php');
			vendor('Code');
			$_vc = new ValidateCode();  //ʵ����һ������
			$_vc->doimg();  
			$_SESSION['authnum_session'] = $_vc->getCode();//��֤�뱣�浽SESSION��
    }
	
	public function post(){
		dump($_SESSION['authnum_session']);
	}
}
?>