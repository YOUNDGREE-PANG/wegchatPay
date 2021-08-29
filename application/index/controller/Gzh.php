<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Request;
use app\index\model\Gzhuser as UserModel;
use app\index\model\Goods;
use app\index\model\Shoucang;
class Gzh extends Controller
{
	
    		 public function index(){
    		//用户同意授权，获取code
    $appid = "wxfd401461261cc2f8";
		 //回调地址
    $redirect_uri = urlencode("https://www.bcjy.online/index/Gzh/getUserInfo");
    	//在确保微信公众账号拥有授权作用域（scope参数）的权限的前提下（服务号获得高级接口后，默认拥有scope参数中的snsapi_base和snsapi_userinfo）
    $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
    	//跳转到 $url
      header("location:".$url);
    }
    			//获取code
    			public function getUserInfo(){

    	$appid = "wxfd401461261cc2f8";
    	
    	$appsecret = "bb81d743518f677040830db88ef9701f";

        $code = $_GET["code"];

        //获取网页授权的access_token

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".

		$appsecret."&code=".$code."&grant_type=authorization_code";

    	//请求 $url 返回一个json    json_decode不加 true 会将json转为对象，加true转为数组

        $res = json_decode(file_get_contents($url),true);

        //获取access_token并赋值给变量
   // return  json($res["access_token"]);
        $access_token = $res["access_token"];

        //获取openid并赋值给变量

        $openid = $res["openid"];
      
         Session::set('user_openid',$openid);

        //拼接字符串并赋值给 $urls

        $urls = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".

		$openid."&lang=zh_CN";

        //请求用户详细信息，并赋值给 $userinfo


        $userinfo = file_get_contents($urls);
        $userinfos=json_decode($userinfo, true);
        $user           = new UserModel;
       $ret = $user ->get(['openid'=>$userinfos['openid']]);
        
      
        
         if(!$ret) {
                $id = $user->save($userinfos);
               if ($id) {
                $this->redirect('user/index');
                } else {
                return $user->getError();
                }
            }else {
            // 获取session
           $this->redirect('user/index');
        }      
    }




//获取code
public function getUserInfo1(){

    	$appid = "wxfd401461261cc2f8";
    	
    	$appsecret = "bb81d743518f677040830db88ef9701f";

        $code = $_GET["code"];

        //获取网页授权的access_token

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".

		$appsecret."&code=".$code."&grant_type=authorization_code";

    	//请求 $url 返回一个json    json_decode不加 true 会将json转为对象，加true转为数组

        $res = json_decode(file_get_contents($url),true);

        //获取access_token并赋值给变量

        $access_token = $res["access_token"];

        //获取openid并赋值给变量

        $openid = $res["openid"];
      
         Session::set('user_openid',$openid);

        //拼接字符串并赋值给 $urls

        $urls = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".

		$openid."&lang=zh_CN";

        //请求用户详细信息，并赋值给 $userinfo


        $userinfo = file_get_contents($urls);
        $userinfos=json_decode($userinfo, true);
        $user           = new UserModel;
        $ret = $user ->get(['openid'=>$userinfos['openid']]);
         if(!$ret) {
               $id = $user->save($userinfos);
               if ($id) {
                echo  '<script>window.location.href="https://www.bcjy.online/index/user/infosettwo?msid=4"</script>';
                } else {
                return $user->getError();
                }
            }else {
            // 获取session
            echo  '<script>window.location.href="https://www.bcjy.online/index/user/infosettwo?msid=4"</script>';
        }      
    }



    





//获取code
public function getUserInfo2(){

    	$appid = "wxfd401461261cc2f8";
    	
    	$appsecret = "bb81d743518f677040830db88ef9701f";

        $code = $_GET["code"];

        //获取网页授权的access_token

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".

		$appsecret."&code=".$code."&grant_type=authorization_code";

    	//请求 $url 返回一个json    json_decode不加 true 会将json转为对象，加true转为数组

        $res = json_decode(file_get_contents($url),true);

        //获取access_token并赋值给变量

        $access_token = $res["access_token"];

        //获取openid并赋值给变量

        $openid = $res["openid"];
      
         Session::set('user_openid',$openid);

        //拼接字符串并赋值给 $urls

        $urls = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".

		$openid."&lang=zh_CN";

        //请求用户详细信息，并赋值给 $userinfo


        $userinfo = file_get_contents($urls);
        $userinfos=json_decode($userinfo, true);
        $user           = new UserModel;
        $ret = $user ->get(['openid'=>$userinfos['openid']]);
         if(!$ret) {
               $id = $user->save($userinfos);
               if ($id) {
                echo  '<script>window.location.href="https://www.bcjy.online/index/user/testpay"</script>';
                } else {
                return $user->getError();
                }
            }else {
            // 获取session
            echo  '<script>window.location.href="https://www.bcjy.online/index/user/testpay"</script>';
        }      
    }








    }




    

