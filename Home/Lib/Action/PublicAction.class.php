<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends BaseAction {
	
	public function index(){
		$header=apache_request_headers();
		$server=$_SERVER;
		exit(json_encode($header));
	}
	
	
    public function login(){
		$params=$this->getParams();
		$name=$params['name'];
		$password=$params['password'];
		$currentUser=false;
		foreach($this->data() as $user){
			if($user['name']==$name && $user['password']==$password){
				$currentUser=$user;
			}
		}
		if($currentUser){
			$_SESSION['status']=true;
			$_SESSION['user']=$currentUser;
			$_SESSION['session_name']= session_name();
			$_SESSION['gc_maxlifetime']=ini_get('session.gc_maxlifetime');
			$_SESSION['session_id'] = session_id();
			$_SESSION['time']=date("Y-m-d H:i:s");
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			 
			}
			$this->ajaxReturn($_SESSION);
		}else{
		    $data=array();
		    $data['status']=false;
		    $data['message']='用户名或密码错误';
		    $this->ajaxReturn($data);
		}
	}
	
	
	public function logout(){
	    session_id($this->_session_id);
	    unset($_SESSION);
	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }
	    session_destroy();
	    $status=$_SESSION?true:false;
	    $data=array('status'=>$status,'session'=>$_SESSION);
	    $this->ajaxReturn($data);
	}
	
	
	

	
	
	
	
	
	
	
	
}








