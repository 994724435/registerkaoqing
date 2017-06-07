<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
//	public function _initialize(){
//		if($_GET['openid']){
//			$menber =M('menber');
//			$user=$menber->where(array('openid'=>$_GET['openid']))->select();
//			S('name',$user[0]['name']);
//			S('userid',$user[0]['id']);
//			S('nickname',$user[0]['nickname']);
//		}
//	}

	public function index(){
		cookie('name','123');
		$_COOKIE['names'] ='names';
		$_SESSION['name2']='namessession';
		$this->display();
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
    //  登录测试
	public function test(){
		$urlaction =$this->get_url();
		if(!$_GET['code']&&!S('userid')){
			$url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
			echo "<script>";
			echo "window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect';";
			echo "</script>";
		}
		if($_GET['code']){
			$code =$_GET['code'];
			$rul="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc5d3f404fe2f97b2&secret=2097ca8ce1ddbe01134577281fc0def8&code=$code&grant_type=authorization_code";
			$result =$this->getlists($rul);
			$openid =$result['openid'];
			$menber =M('menber');
			$user=$menber->where(array('openid'=>$openid))->select();
			$usrid =$user[0]['id'];
			S('name'.$usrid,$user[0]['name']);
			S('userid'.$usrid,$user[0]['id']);
			S('nickname'.$usrid,$user[0]['nickname']);
		}
	}
    // 用户注册
	public function useradd(){
		if($_POST){
			$data['name'] = $_POST['name'];
			$data['email'] =$_POST['email'];
			$data['tel']   =$_POST['tel'];
			$data['group'] =$_POST['group'];
			$data['addtime'] =date('Y-m-d H:i:s',time());
			$menber =M('menber');
			if(!$_GET['openid']){
				print_r("openid不存在");die;
			}
			$user= $menber->where(array('openid'=>$_GET['openid']))->select();
			if($user[0]){
				echo "<script>alert('该用户已存在');";
				echo "window.location.href='/register/index.php/Home/Index/useradd/openid/{$openid}';";
				echo "</script>";
				exit;
			}
			$access_token = $this->gettoken();
			$token =$access_token['access_token'];
			$openid =$_GET['openid'];
			$url ="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$token&openid=$openid&lang=zh_CN";
			$users =  $this->getlists($url);
			$data['userface'] =$users['headimgurl'];
			$data['address'] =$users['province'].$users['city'];
			$data['openid'] =$openid;
			$data['nickname'] =$users['nickname'];
			$data['sex'] =$users['sex'];
			$userid= $menber->add($data);  // 获取微信信息 tu do
			if($userid){
				echo "<script>alert('注册成功');";
				echo "window.location.href='/register/index.php/Home/Index/index/openid/{$openid}';";
				echo "</script>";
				exit;
			}
		}
		$this->display();
	}

	private function gettoken()
	{
		$appid = 'wxc5d3f404fe2f97b2';
		$secret = '2097ca8ce1ddbe01134577281fc0def8';
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . "";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
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

	private function curlget($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
//		执行并获取HTML文档内容
		$output = curl_exec($ch);
		//释放curl句柄
		curl_close($ch);
		return json_decode($output, true);
	}
}