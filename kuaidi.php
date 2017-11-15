<?php 
include './function.php';

// $url = 'http://www.kuaidi100.com/autonumber/autoComNum?text='.Token::getToken();
// $url ='http://www.kuaidi100.com/autonumber/autoComNum?text=3318022286405';


// $res = https_request($url);

// $data = json_decode($res,true);

// $company = $data['auto'][0]['comCode'];

// // var_dump($company );

// $q_url = 'http://www.kuaidi100.com/query?type=shentong&postid=3318022286405&id=1&valicode=&temp=0.9518000778481239';

// $res1 = https_request($q_url);

// $result = json_decode($res1,true);

// $str ='';

// foreach ($result['data'] as $key =>$value) {
// 	$str .= $value['time']."\r\n".$value['context']."\r\n";
// }

$str = Kuaidi::getYundanInfo('3318022286405');

var_dump($str);


 ?>