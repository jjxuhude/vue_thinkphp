<?php
// ������ϵͳ�Զ����ɣ�����������;
class IpAction extends Action {
	
	function ip(){
		
		header('Content-Type:text/html;Charset=utf-8');
		
		

		$fd=fopen('visitor.csv', "r") or die("Couldn't open csv file $file");
		$i=0;
		echo str_repeat(" ", 4096);
		while($data = fgetcsv($fd, '', ",") ){
				$row="";
				foreach($data as $ip){
					$row.=long2ip($ip).",";	
					$ipInfos = $this->GetIpLookup($ip);
				}
				dump($row);
				ob_flush(); //�˾䲻����
				flush();
				error_log($row."\n",3,'visitor_new.csv');
		}
		
		ob_end_flush();
		
	}


	
	function index(){
		header('Content-Type:text/html;Charset=utf-8');
		
		

		$fd=fopen('1.csv', "r") or die("Couldn't open csv file $file");
		$i=0;
		echo str_repeat(" ", 4096);
		while($data = fgetcsv($fd, '', ",") ){
			$ipInfos = $this->GetIpLookup($data[1]);
			if($ipInfos){
				$info=array();
				$info[]=$data[0];
				$info[]=$data[1];
				$info[]=$data[3];
				$info[]=$data[4];
				$info[]=$ipInfos['country'];
				$i++;
				echo $i.":".$data[0]."\n";
				
				error_log(join(',',$info)."\n",3,'11.csv');
				
			}
		}
		
	}
	

	


	function GetIpLookup($ip = ''){
		if(empty($ip)){
			$ip = $this->GetIp();
		}
		
		$res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);

		if(empty($res)){ return false; }
		$jsonMatches = array();
		preg_match('#\{.+?\}#', $res, $jsonMatches);
		if(!isset($jsonMatches[0])){ return false; }
		$json = json_decode($jsonMatches[0], true);
		if(isset($json['ret']) && $json['ret'] == 1){
			$json['ip'] = $ip;
			unset($json['ret']);
		}else{
			return false;
		}
		return $json;
	}
	
	function GetIp(){
		$realip = '';
		$unknown = 'unknown';
		if (isset($_SERVER)){
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
				$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
				foreach($arr as $ip){
					$ip = trim($ip);
					if ($ip != 'unknown'){
						$realip = $ip;
						break;
					}
				}
			}else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
				$realip = $_SERVER['HTTP_CLIENT_IP'];
			}else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
				$realip = $_SERVER['REMOTE_ADDR'];
			}else{
				$realip = $unknown;
			}
		}else{
			if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			}else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
				$realip = getenv("HTTP_CLIENT_IP");
			}else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
				$realip = getenv("REMOTE_ADDR");
			}else{
				$realip = $unknown;
			}
		}
		$realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
		return $realip;
	}
	
}



class curlClass {

    public function get($url, $params=array()) {
        //��ʼ��curl����
        $ch = curl_init();
        //���� cur ��Ӧ���� 
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params)); //����curl����url
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); //����curl�������ʱ��
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //����curl�Ƿ��з�������
        //ִ��curl���з������ݣ�
        $returnTransfer = curl_exec($ch);
        //�ر�curl
        curl_close($ch);
        //��������
        return $returnTransfer;
    }

    public function post($url, $params=array()) {
        //��ʼ��curl����
        $ch = curl_init();
        // ���� curl ��Ӧ���� 
        curl_setopt($ch, CURLOPT_URL, $url); //����curl����url
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); //����curl�������ʱ��
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //����curl�Ƿ��з�������
        curl_setopt($ch, CURLOPT_POST, true); //����curl POST��ʽ�ύ����
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //����curl POST ������
        //ִ��curl���з������ݣ�
        $returnTransfer = curl_exec($ch);
        //�ر�curl
        curl_close($ch);
        //��������
        return $returnTransfer;
    }

}


