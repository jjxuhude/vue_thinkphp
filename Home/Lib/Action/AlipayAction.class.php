<?php
// 本类由系统自动生成，仅供测试用途
class AlipayAction extends Action {
    public function index(){
		$responseData=json_decode( $this->request());
		if(is_object($responseData)){
			//dump($responseData->id);
			//dump($responseData->result->code);
			//dump($responseData->result->description);
			$this->data=$responseData;
			$this->display();
		}
		

    }

	
	function request() {
		$url = "https://test.oppwa.com/v1/checkouts";
		$data = "authentication.userId=8a8294174e2eee69014e3e729fb31cba" .
			"&authentication.password=xM3WgEhBRC" .
			"&authentication.entityId=8a8294174e2eee69014e3e729fa21cb6" .
			"&amount=92.00" .
			"&currency=EUR" .
			"&paymentType=PA";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$responseData = curl_exec($ch);
		if(curl_errno($ch)) {
			return curl_error($ch);
		}
		curl_close($ch);
		return $responseData;
	}

	
	
}








