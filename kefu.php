<?php 
include './function.php';

$url = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token='.Token::getToken();

$url_data = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token='.Token::getToken();

$data = '{


			    "touser":"o7OLYv6KvFnbqyOOPu9PM51n2u18",
			    "msgtype":"text",
			    "text":
			    {
			         "content":"你好吗？"
			    }

			}';

$kefu = '{

	
		     "kf_account" : "15037847256@gh_07529e451716",
		     "nickname" : "I think , therefore I am.",
		     "password" : "ef506ad1c6c7c9d8a0a48fd45075cfab",

		}';


$res = https_request($url_data,$data);

$aaa = https_request($url,$kefu);

var_dump($res);
var_dump($aaa);

 ?>