<?php 
include './function.php';

//设置所属行业
$url = 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token='.Token::getToken();

$data= '{
          "industry_id1":"22",
          "industry_id2":"24"
       	}';
//获取行业信息
$q_url ='https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token='.Token::getToken();


//获取模板id
$moban_url = 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token='.Token::getToken();

$moban_data = '{
           "template_id_short":"TM00015"
       }';

//获取模板列表
$list_url = 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token='.Token::getToken();

$res = https_request($list_url);
var_dump($res);















 ?>