<?php
// 本类由系统自动生成，仅供测试用途
class IoAction extends Action {
	
	function index(){
		//$file=glob('C:\wamp\www\thinkphp\rename\image\*');
		#dump($file);
		
		
		$dir='C:/wamp/www/thinkphp/REST/';
		$filename="C:/wamp/www/thinkphp/rest-products-image.csv";
		$file = fopen($filename,"r");
		while(! feof($file)){
		  $arr=fgetcsv($file);
		  if(is_file($dir.$arr[0])){
			  rename($dir.$arr[0],$dir.$arr[1]);
		  }
		}
		fclose($file);
				
	}
	
}







