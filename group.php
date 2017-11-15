<?php 
include './function.php';

//创建用户分组
$url = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token='.Token::getToken();


$data = '{"group":{"name":"元宝组"}}';
$data2 = '{"group":{"name":"元宝组2"}}';
$data3 = '{"group":{"name":"元宝组3"}}';
$data4 = '{"group":{"name":"元宝组4"}}';
// $res = https_request($url,$data3);
// var_dump($res);

// 查询所有分组

$g_url = 'https://api.weixin.qq.com/cgi-bin/groups/get?access_token='.Token::getToken();

// $res = https_request($g_url);
// var_dump($res);
//查询用户所在分组
$u_url = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token='.Token::getToken();
$u_data ='{"openid":"o7OLYv3l6o6YuIzDkgWBX9MT6dfI"}';

// $res2 = https_request($u_url,$u_data);
// var_dump($res2);

//移动用户分组

$move_url ='https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.Token::getToken();
$m_data = '{"openid":"o7OLYv3l6o6YuIzDkgWBX9MT6dfI","to_groupid":102}';

// $re = https_request($move_url,$m_data);
// var_dump($re); 


//删除分组
// $del_url = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token='.Token::getToken();
// $del_data = '{"group":{"id":101}}';
// $res = https_request($del_url,$del_data);
// var_dump($res);


$name_url = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token='.Token::getToken();

$name_data = '{
	"openid":"o7OLYv3l6o6YuIzDkgWBX9MT6dfI",
	"remark":"Lizhenlei"
}';

$name = https_request($name_url,$name_data);

var_dump($name);




 ?>