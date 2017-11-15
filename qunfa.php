<?php 
include './function.php';

$url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.Token::getToken();

$data = '{
			   "touser":[
			    "o7OLYv6KvFnbqyOOPu9PM51n2u18",
			    "o7OLYvysQL5fomW_4ma3HXG1fBSU"
			   ],
			    "msgtype": "text",
			    "text": { "content": "爷，快来快活啊!"}
			}';

$res = https_request($url,$data);

var_dump($res);




 ?>