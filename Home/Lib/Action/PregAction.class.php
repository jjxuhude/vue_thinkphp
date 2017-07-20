<?php
// 本类由系统自动生成，仅供测试用途
class PregAction extends Action {
	
	public function index(){
		$optionVal="1G2B222222";
		$result=preg_match('/^[BG]/',$optionVal);
		dump($result);
	}
	
	
	public function index2(){
		$optionVal="11111.png11";
		$result=preg_match('/\.png$/',$optionVal);
		dump($result);
	}
	
    public function index1(){
		preg_match('/^(http:\/\/|https:\/\/)(.*?)\/$/','http://www.hao123.com/',$match);
		dump($match);
			$this->display();
	
    }
	
	function oauth(){
		dump("Oauth");
	}
	
	function getOrder(){
		$client = new SoapClient('http://myshop.org/api/soap/?wsdl');
		$session = $client->login('jjxuhuade', '1111qqqq');
		$result = $client->call($session, 'order.list');
	}
	
	function map(){
		//$hash = unserialize(file_get_contents("https://vimeo.com/api/v2/video/92496833.php"));
		//dump($hash);
		$this->display();
	}
	
	function url(){
		$str="http://en.hair.com/customer/account/create/?name=xuhuade";
		dump($str);
		$patterns[0]="/(^http:\/\/)(.+)\.(.*)?/U";
		$patterns[1]="/\?(.*)/";
		$replace[0]='\\1www.\\3';
		$replace[1]='';
 		$url=preg_replace($patterns,$replace,$str);
		echo $url;
	}
	
	function replace(){
		echo preg_replace(array('/aaa|bbb|ccc|ddd/'),array(1),'aaa,bbb,ccc,ddd');
	}
	
	function replace1(){
		echo preg_replace(array('/\s/'),array("_"),' aaa bbb ccc ddd');
	}
	
	function replace2(){
		$sku="HW-123";
		if(preg_match("/^(HW-)/",$sku,$match)){
				echo 	preg_replace(array('/^HW-/'),array(''),$sku);
		}else{
			echo 'no';
		}
	}
	
	function replace3(){
		echo preg_replace(array('/\s/'),array(''),'89,70 €');
		echo preg_replace(array('/\s/'),array(''),'$ 17.95');
	}
	
	function preg(){
		$str="b1bb";
		$re="/aAa |bbb|cCc/i";
		
		echo preg_match($re,$str);
	}
	
	function match(){
		$str="11111112-abc-ddd";
		$re="/^(.*?)-/";
		preg_match($re,$str,$data);
		dump($data);
	}
	
	function int(){
		$str="22 aaaaaaaaaaaasdf212312";
		echo "-".(int)$str;
	}
	
	function ip(){
		header('Content-Type:text/html;Charset=utf-8');
		
		$fd=fopen('data.csv', "r") or die("Couldn't open csv file $file");
		while($data = fgetcsv($fd, '', ",") ){
			$ipInfos = $this->GetIpLookup($data[0]);
			$info=array();
			$info[]=$data[0];
			$info[]=$ipInfos['country'];
			
			error_log(join(',',$info)."\n",3,'ip.csv');
		}
		
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
	
	function percent(){
		$discount="101";
		dump((int)$discount);
		dump(stripos($discount,'%'));
	}
	
	function ren(){
		$file="./1.jpg";
	    $file= realpath($file);
		dump(getimagesize($file));
		
	
	}
	
	
	function preg1(){
		preg_match('@^(?:http://)?([^/]+)@i',"http://www.php.net/index.html", $matches);
		preg_match('/^http:\/\/(+*)/',"http://www.php.net/index.html", $matches);
		preg_match('/^\{(.*)\}$/',"{1234567890qwertyuiop}", $matches);
		dump($matches);
		
	}
	
	
	function street(){
		$string='RM1113 Block E.Hiu Lai Court, Kwun Tong, KLN, Hong Kong';
		echo strlen($string);
		dump($this->splitAddress($string));
	}
	
	
	public function splitAddress($full_address){
		$length=50;
		if(strlen($full_address)>$length){
			$sub_50=substr($full_address,0,$length);
			$split_arr=preg_split('/[\s,.]+/',$sub_50,-1, PREG_SPLIT_OFFSET_CAPTURE);
			$last_arr=array_pop($split_arr);
			$street1=substr($full_address,0,$last_arr[1]);
			$street2=substr($full_address,$last_arr[1]);
		}else{
			$street1=$full_address;
			$street2='';
		}
		
		return array($street1,$street2);
	}
	
	
	public function dir(){
	   $dir='./hoganlovells';
	   //$file=$this->getDir($dir);
	   //dump($file);
	   $this->readDir($dir);
	   
	}
	
	public function readDir($dir){
	      $dirinfo=scandir($dir);
	      for ($i = 0; $i < count($dirinfo); $i++) {
	          if(!in_array($dirinfo[$i],array('.','..'))){
	              if(!is_dir($dir."/".$dirinfo[$i])){
	               $file[]=$dir."/".$dirinfo[$i];
	              }else{
	                $subdir[]=$dir."/".$dirinfo[$i];
	              }
	          }
	      }
		  if(count($subdir)){
			  foreach($subdir as $val){
				  $this->readDir($val);
			 }
		  }	
	     
		  if(count($file)){
			  $html="<h3>".$dir."</h3>";
			  $html.='<ol>';
			  foreach($file as $item){
				  
				  $html.='<li>';
				  $html.="<a href='/".$item."'>";
				  $html.=$item;
				  $html.="</a>";
				  $html.=" Size:".round(filesize($item)/1024/1024,2)."M";
				  $html.='</li>';
			  }
			  $html.='</ol>';
		  }
	     
	      //return $file;
		  echo  $html;
	      
	}
	
	
	
	
	function getDir($dir){
	    $data=array();
	    $this->searchDir($dir,$data);
	    return   $data;
	}
	
	function searchDir($path,&$data){
	    if(is_dir($path)){
	        $dp=dir($path);
	        while($file=$dp->read()){
	            if($file!='.'&& $file!='..'){
	                $this->searchDir($path.'/'.$file,$data);
	            }
	        }
	        $dp->close();
	    }
	    if(is_file($path)){
	        $data[]=$path;
	    }
	}
	
	function gift(){
		
			$prize_arr = array( 
				'0' => array('id'=>1,'prize'=>'平板电脑','v'=>1), 
				'1' => array('id'=>2,'prize'=>'数码相机','v'=>5), 
				'2' => array('id'=>3,'prize'=>'音箱设备','v'=>10), 
				'3' => array('id'=>4,'prize'=>'4G优盘','v'=>12), 
				'4' => array('id'=>5,'prize'=>'10Q币','v'=>22), 
				'5' => array('id'=>6,'prize'=>'下次没准就能中哦','v'=>50), 
			); 
			foreach ($prize_arr as $key => $val) { 
				$arr[$val['id']] = $val['v']; 
			} 
			 
			$rid = get_rand($arr); //根据概率获取奖项id 
			 
			$res['yes'] = $prize_arr[$rid-1]['prize']; //中奖项 
			unset($prize_arr[$rid-1]); //将中奖项从数组中剔除，剩下未中奖项 
			shuffle($prize_arr); //打乱数组顺序 
			for($i=0;$i<count($prize_arr);$i++){ 
				$pr[] = $prize_arr[$i]['prize']; 
			} 
			$res['no'] = $pr; 
			echo json_encode($res); 

				}
	

	
	
}

function get_rand($proArr) { 
    $result = ''; 
 
    //概率数组的总概率精度 
    $proSum = array_sum($proArr); 
 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 
 
    return $result; 
} 






