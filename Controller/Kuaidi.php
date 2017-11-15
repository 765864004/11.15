<?php 
/**
*  快递
*/

class Kuaidi
{
	public static function getYundanInfo($code)
	{
		$url ='http://www.kuaidi100.com/autonumber/autoComNum?text='.$code;


		$res = https_request($url);

		$data = json_decode($res,true);

		$company = $data['auto'][0]['comCode'];

		// var_dump($company );

		$q_url = 'http://www.kuaidi100.com/query?type=shentong&postid='.$code.'&id=1&valicode=&temp=0.9518000778481239';

		$res1 = https_request($q_url);

		$result = json_decode($res1,true);

		$str ='';

		foreach ($result['data'] as $key =>$value) {
			$str .= $value['time']."\r\n".$value['context']."\r\n";
		}
		return $str;
	}
}



 ?>