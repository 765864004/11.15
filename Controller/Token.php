<?php 
/** 
*  这里是token类 用来获取access_token
*/
class Token
{
	public static $tokenFile ='saestor://token.txt';
	public static $tokenExpireTime = 3600;
	//入口方法 外面调用次接口是 先经过getToken()
	public static function getToken()
	{
		//判断缓存的 合法
		if(!self::checkTokenFileExists() || self::checkenExpire())
		{
			//请求token
			$res = self::requestToken();
			//写入
			self::writeToken($res);
			return $res;
		}

		return self::readToken();

	}
	//请求的方法
	public static function requestToken()
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx14182566ef296468&secret=cfea1529373d2e37cb060d8e2e165b2b';

		$res = https_request($url);
		// json 转为数组
		$res =json_decode($res,true);
		$token = $res['access_token'];

		if ( !empty($token) ) {
			return $token;
		}else{

			return false;
		}
	}

	//写入token 缓存
	public static function writeToken($token)
	{
		file_put_contents(self::$tokenFile,$token);
	}

	//读取token 缓存
	public static function readToken()
	{
		return file_get_contents(self::$tokenFile);
	} 

	//判断token缓存是否存在
	public static function checkTokenFileExists()
	{
		return file_exists(self::$tokenFile);
	}

	//判断缓存是否有效
	public static function checkTokenExpire()
	{
		return filemtime(self::$tokenFile) + self::$tokenExpireTime < time();
	}


}


 ?>