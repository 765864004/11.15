<?php 
include './function.php';

//
$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.Token::getToken();

$data = ' {
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';

$m_data = '{
    "button": [
        {
            "name": "扫码", 
            "sub_button": [
                {
                    "type": "scancode_waitmsg", 
                    "name": "扫码带提示", 
                    "key": "rselfmenu_0_0", 
                    "sub_button": [ ]
                }, 
                {
                    "type": "scancode_push", 
                    "name": "扫码推事件", 
                    "key": "rselfmenu_0_1", 
                    "sub_button": [ ]
                }
            ]
        }, 
        {
            "name": "发图", 
            "sub_button": [
                {
                    "type": "pic_sysphoto", 
                    "name": "系统拍照发图", 
                    "key": "rselfmenu_1_0", 
                   "sub_button": [ ]
                 }, 
                {
                    "type": "pic_photo_or_album", 
                    "name": "拍照或者相册发图", 
                    "key": "rselfmenu_1_1", 
                    "sub_button": [ ]
                }, 
                {
                    "type": "pic_weixin", 
                    "name": "微信相册发图", 
                    "key": "rselfmenu_1_2", 
                    "sub_button": [ ]
                }
            ]
        }
    ]
}';

$res = https_request($url,$m_data);
var_dump($res);














 ?>