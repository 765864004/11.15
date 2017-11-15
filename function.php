<?php 

function https_request($url,$data)
{
	// curl 初始化
	$curl = curl_init();

	// 设置参数
	curl_setopt($curl, CURLOPT_URL, $url); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

	if ( !empty($data) ) {
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
		
	}
 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec($curl);
	return $res; 
	
}

function __autoload($className)
{
	if ( file_exists('./Controller/'.$className.'.php') ) {
		include './Controller/'.$className.'.php';
	}
}







 ?>