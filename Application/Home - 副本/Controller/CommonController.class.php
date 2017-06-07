<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){
		if($_GET['openid']){
				$menber =M('menber');
				$user=$menber->where(array('openid'=>$_GET['openid']))->select();
				session('name',$user[0]['name']);
				session('userid',$user[0]['id']);
				session('nickname',$user[0]['nickname']);
		}
		if($_POST){
			if($_POST['userid']){
				$menber =M('menber');
				$user=$menber->where(array('id'=>$_POST['userid']))->select();
				if($user[0]){
					session('name',$user[0]['name']);
					session('name',$user[0]['name']);
					session('userid',$user[0]['id']);
					session('nickname',$user[0]['nickname']);
				}
			}
		}else{
			$urlaction =$this->get_url();
//			$urlactions =$urlaction."/case/1";
//			if(!$_GET['case']){
//				print_r($urlactions);die;
//				echo "<script>";
//				echo "window.location.href='$urlactions';";
//				echo "</script>";
//			}
//			if(!$_GET['code']){
//				echo "<script>";
//				echo "window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect';";
//				echo "</script>";
//			}
//			if($_GET['code']){
//				$code =$_GET['code'];
//				$rul="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc5d3f404fe2f97b2&secret=2097ca8ce1ddbe01134577281fc0def8&code=$code&grant_type=authorization_code";
//				$result =$this->getlists($rul);
//				$openid =$result['openid'];
//				$menber =M('menber');
//				$user=$menber->where(array('openid'=>$openid))->select();
//				if($user[0]){
//					session('name',$user[0]['name']);
//					session('userid',$user[0]['id']);
//					session('nickname',$user[0]['nickname']);
//					$this->assign('userid',$user[0]['id']);
//				}else{
//					echo "<script>alert('新员工需要注册信息');";
//					echo "window.location.href='/register/index.php/Home/Index/useradd/openid/$openid';";
//					echo "</script>";
//					exit;
//				}
//			}
		}

	}

	/**
	 * 获取当前页面完整URL地址
	 */
	private function get_url() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
	}

	private function getlists($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
	}

}