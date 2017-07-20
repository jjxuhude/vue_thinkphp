<?php
class BaseAction extends Action {
	
	protected $_params;
	protected $_method;
	protected $_header;
	protected $_session_id;
	
	public function _initialize(){
		ini_set("session.cookie_httponly", 1); 
		header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,session_id");
	    //header('Content-Type:application/json; charset=utf-8');
		$this->_params=$this->getParams();
		$this->_method=$this->getMethod();
		$this->_header=getallheaders();
		$this->_session_id=$this->getSessionId();
		if($this->_method==='OPTIONS'){
			header('http/1.1 200');
			exit;
		}
		session_start();
		
	}
	
	protected function data($id=false){
	   $data=array(
			array('id'=>1,'name'=>'user01','password'=>'111111'),
			array('id'=>2,'name'=>'user02','password'=>'222222'),
			array('id'=>3,'name'=>'user03','password'=>'333333'),
			array('id'=>4,'name'=>'user04','password'=>'444444'),
			array('id'=>5,'name'=>'user05','password'=>'555555'),
			array('id'=>6,'name'=>'admin','password'=>'111111'),
	       
		);
		if($id==false){
			return $data;
		}else{
			return $data[$id-1];
		}
	}
	
	protected function getParams($name=false){
		$params=json_decode(file_get_contents("php://input"),true)?:$_GET;
		if($name){
			return $params[$name];
		}else{
			return $params;
		}
	}
	
	protected function getMethod(){
		return $_SERVER['REQUEST_METHOD'];
	}
	

	protected function getSessionId(){
	    $cookie=$this->_header['Cookie'];
	    $sessionName=session_name();
	    $sessionId=str_replace($sessionName."=", '',$cookie);
	    return $sessionId;
	}
	
	
	protected function isLogin(){
	    session_id($this->_session_id);
	    $status=$_SESSION?true:false;
	    $data=array('status'=>$status,'session'=>$_SESSION);
	    return $data;
	}
	

	
	
}








