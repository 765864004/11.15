<?php
/**
  * wechat php test 新浪云
  */ 

//获取用户的输入
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

file_put_contents('saestor://content.txt', $postStr);

//被动回复消息
libxml_disable_entity_loader(true);         //xml保护模式
$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);  //转化xml对象
$fromUsername = $postObj->FromUserName;     //用户id
$toUsername = $postObj->ToUserName;         //商户id
$keyword = trim($postObj->Content);         //接收到的内容
$time = time();

$EventKey = $postObj->EventKey;

// 事件的判断
switch( $EventKey ) {
    case 'rselfmenu_0_1':
    $temp = $postObj->ScanCodeInfo->ScanResult;
    //可以在这里打印下看看  0 11 1->单号
    $code = explode(',',$temp);
    //单号
    $c = $code[1];
    $codeinfo = Kuaidi::getYundanInfo($c);
    $textTpl1 =  "<xml>
                    <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
                    <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
                    <CreateTime>".$time."</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[".$codeinfo."]]></Content>
                    </xml>";

        break;

    // default:
    //     $textTpl2 ="<xml>
    //                 <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
    //                 <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
    //                 <CreateTime>".$time."</CreateTime>
    //                 <MsgType><![CDATA[text]]></MsgType>
    //                 <Content><![CDATA[努力吧,小码农!]]></Content>
    //                 </xml>";
    //     break;

    }

    echo $textTpl1;
    // echo $textTpl2;


switch( $keyword ) {

    case '你好':
    $textTpl = "<xml>
            <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
            <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
            <CreateTime>".$time."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[你好]]></Content>
            </xml>";
        break;
    case '天冷了':
    $textTpl = "<xml>
            <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
            <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
            <CreateTime>".$time."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[注意保暖，适当增添衣服！]]></Content>
            </xml>";
        break;

    case '没钱了':
    $textTpl = "<xml>
            <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
            <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
            <CreateTime>".$time."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[努力工作，挣大钱！]]></Content>
            </xml>";
        break;

    default:
        $textTpl = "<xml>
            <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
            <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
            <CreateTime>".$time."</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[开发人员比较懒，什么也没有留下!]]></Content>
            </xml>";
        break;

    }
    echo $textTpl;





// echo $textTpl1;
// echo $textTpl2;
// echo $textTpl3;
// echo $textTpl4;





//define your token
define("TOKEN", "lihuawei");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>