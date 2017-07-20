<?php
// 本类由系统自动生成，仅供测试用途
class VueAction extends BaseAction {

		function _initialize(){
			parent::_initialize();
			$header=$this->_header;
            $session_id = $header['session_id'];
			if (empty($session_id)) {
				$this->ajaxReturn(array('error'=>true,'code'=>101, 'message'=>'登录已失效'));
			}else{
			    $data=$this->isLogin();
			    if($data['status']===false){
			        $data['message']='会话已经失效';
			        $data['islogin']=false;
			        $data['status']=false;
			        $this->ajaxReturn($data);
			    }
			}
			
		}

		function index(){
		    $data['items']=$this->data();
		    $data['status']=true;
			exit(json_encode($data));
			
		}

	
	
}








