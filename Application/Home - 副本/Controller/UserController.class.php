<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class UserController extends CommonController{
	public function record(){
		// 考勤记录
		$log =M('log');
		$result = $log->where(array('userid'=>session('userid')))->order('id desc')->select();
		$this->assign('res',$result);
		$this->display();
	}
// 个人中心
	public function personCenter(){
		$menber =M('menber');
		if($_POST){     //  tu do
			$data['name'] =$_POST['name'];
			$data['email']=$_POST['email'];
			$data['tel'] = $_POST['tel'];
			$data['sex'] =$_POST['sex'];
			$menber->where(array('id'=>session('userid')))->save($data);
			echo "<script>";
			echo "window.location.href='/register/index.php/Home/User/personCenter';";
			echo "</script>";
			exit;
		}else{
//			$urlaction =$this->get_url();
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
//					session('name',$user[0]['name']);
//					session('userid',$user[0]['id']);
//					session('nickname',$user[0]['nickname']);
//
//				}else{
//					echo "<script>alert('新员工需要注册信息');";
//					echo "window.location.href='/register/index.php/Home/Index/useradd/openid/$openid';";
//					echo "</script>";
//					exit;
//				}
//			}
		}
		$result = $menber->where(array('id'=>session('userid')))->select();
		$this->assign('user',$result[0]);
		$this->display();
	}
// 我要请假
	public function leave(){
		$message =M('message');
		$result = $message->where(array('userid'=>session('userid'),'type'=>1))->order('state asc')->select();
		$this->assign('user',$result);
		$this->display();
	}

	// 上班打卡
	public function clock(){
		$urlaction =$this->get_url();
//		if(!$_GET['code']){
//			$url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
//			echo "<script>";
//			echo "window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect';";
//			echo "</script>";
//		}
//		if($_GET['code']){
//			$code =$_GET['code'];
//			$rul="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc5d3f404fe2f97b2&secret=2097ca8ce1ddbe01134577281fc0def8&code=$code&grant_type=authorization_code";
//			$result =$this->getlists($rul);
//			$openid =$result['openid'];
//			$menber =M('menber');
//			$user=$menber->where(array('openid'=>$openid))->select();
//			if($user[0]){
//				session('name',$user[0]['name']);
//				session('userid',$user[0]['id']);
//				session('nickname',$user[0]['nickname']);
//			}else{
//				echo "<script>alert('新员工需要注册信息');";
//				echo "window.location.href='/register/index.php/Home/Index/useradd/openid/$openid';";
//				echo "</script>";
//				exit;
//			}
//
//		}

		$log =M('log');
		$date = date('Y-m-d',time());
		$condtion['addtime'] =array('like',"%$date%");
		$condtion['userid'] =session('userid');
		$res = $log->where($condtion)->order('id desc')->select();
		$appid = 'wxc5d3f404fe2f97b2';
		$appSecret = '2097ca8ce1ddbe01134577281fc0def8';
		$Jsdk =new \Org\Util\Jsdk($appid,$appSecret);
		$result = $Jsdk->getSignPackage();
		$this->assign('signPackage',$result);
		$this->assign('res',$res);
		$this->display();
	}

	// 提交请假
	public function enroll(){
		if($_POST){
			if(empty($_POST['starttime'])||empty($_POST['endtime'])){
				echo "<script>alert('时间不能为空');";
				echo "window.location.href='/register/index.php/Home/User/enroll';";
				echo "</script>";
				exit;
			}
			$message =M('message');
			$data['userid'] =session('userid');
			$data['name'] =session('name');
			$data['nickname'] =session('nickname');
			$data['starttime']=$_POST['starttime'];
			$data['endtime'] = $_POST['endtime'];
			$data['cont'] = $_POST['cont'];
			$data['addtime'] =date('Y-m-d H:i:s',time());
			$data['type'] =1;
			$result = $message->add($data);
			if($result){
				echo "<script>alert('提交成功');";
				echo "window.location.href='/register/index.php/Home/User/leave';";
				echo "</script>";
				exit;
			}else{
				echo "<script>alert('提交失败');";
				echo "window.location.href='/register/index.php/Home/User/enroll';";
				echo "</script>";
				exit;
			}
		}else{
//			$urlaction =$this->get_url();
//			if(!$_GET['code']){
//				$url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc5d3f404fe2f97b2&redirect_uri=$urlaction&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
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
//				}else{
//					echo "<script>alert('新员工需要注册信息');";
//					echo "window.location.href='/register/index.php/Home/Index/useradd/openid/$openid';";
//					echo "</script>";
//					exit;
//				}
//			}
		}
		$this->display();
	}

	// 摇一摇
	public function shake(){
		$data['latitude'] = $_GET['latitude'];
		$data['longitude']= $_GET['longitude'];
		$data['addtime']  = date('Y-m-d H:i:s',time());
		$data['addymd']  = date('Y-m-d',time());
		$url ="http://api.map.baidu.com/geocoder/v2/?ak=neLjedZv94AbgyjU0qVxSkCe&location={$data['latitude']},{$data['longitude']}&output=json&pois=1";
		$local= $this->curl($url);
		$data['addr'] =$local['result']['formatted_address'];
		$data['name']= session('name');
		$data['nickname']= session('nickname');
		$data['userid']= session('userid');
		// 判断打卡位置
		$sets =M('sets');
		$map['id']=array('in','5,6,7');
		$res= $sets->where($map)->select();
		foreach($res as $k=>$v){
			if($v['id']==5){
				$longitude =$v['cont'];
			}
			if($v['id']==6){
				$latitude =$v['cont'];
			}
			if($v['id']==7){
				$scope =$v['cont'];
			}
		}
		$longitudeabs =abs($longitude-$data['longitude']);
		$latitudeabs  =abs($latitude-$data['latitude']);
		if($longitudeabs>$scope||$latitudeabs>$scope){
			$this->assign('islocal',1);
			$this->display();
			exit();
		}

		// 日期判断
		$res= $sets->where(array('id'=>1))->select();
		if (strpos($res[0]['cont'], date('Y-m-d',time())) !== false) {
			$this->assign('isshake',1);
		}else{
			$map['id']=array('in','2,3,4');
			$res= $sets->where($map)->select();
			foreach($res as $k=>$v){
				if($v['id']==2){
					$islate =$v['cont'];   // 早上签到时间点
				}
				if($v['id']==3){
					$timearray1 =$v['cont'];  // 设置可以签到的时间  上午
				}
				if($v['id']==4){
					$timearray2 =$v['cont'];  // 设置可以签到的时间  下午
				}
			}

			$timearray1 =explode(',',$timearray1);
			$timearray2 =explode(',',$timearray2);
			if(in_array(date('H',time()),$timearray1)||in_array(date('H',time()),$timearray2)){
				$data['type'] = 2;  // 1 签到 2，退签
				$data['state'] =1;  // 1 成功 2 迟到
				if(in_array(date('H',time()),$timearray1)){  // 上午
					$data['type'] = 1;
					// 判断是否迟到  上午
//					$islate = $res[0]['cont'];       // 早上签到时间点
					$now_time =strtotime(date('H:i'));
					$islate=strtotime($islate);
					$data['state'] =1;
					if($now_time>$islate){
						$data['state'] =2;
					}
					// 判断上午是否已经打卡
					$log = M('log');
					$date = date('Y-m-d',time());
					$condtion['addtime'] =array('like',"%$date%");
					$condtion['type'] =1;
					$condtion['userid'] =session('userid');

					// 判断此时段是否已经打卡
					$res = $log->where($condtion)->select();
					if($res[0]){
						$this->assign('iscome',1);
					}else{
						$result = $log->add($data);
					}
				}

				if(in_array(date('H',time()),$timearray2)){ // 下午
					$data['type'] = 2;
					// 判断下午是否打卡
					$log = M('log');
					$date = date('Y-m-d',time());
					$condtion['addtime'] =array('like',"%$date%");
					$condtion['type'] =2;
					$condtion['userid'] =session('userid');
					$res = $log->where($condtion)->select();
					if($res[0]){
						$log->where($condtion)->save(array('addtime'=>date('Y-m-d H:i:s',time())));
						$this->assign('iscome',1);
					}else{
						$result = $log->add($data);
					}
				}
				

			}else{
				$this->assign('isshake',1);
			}

		}
		$this->display();
	}

	private function curl($url)
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

	// 考勤申诉列表
	public function appeallist(){
		$message =M('message');
		$result = $message->where(array('userid'=>session('userid'),'type'=>2))->order('state asc')->select();
		$this->assign('user',$result);
		$this->display();
	}

	// 考勤申诉
	public function appeal(){
		if($_POST){
			$message =M('message');
			$data['userid'] =session('userid');
			$data['name'] =session('name');
			$data['nickname'] =session('nickname');
			$data['starttime']=$_POST['starttime'];
			$data['endtime'] = $_POST['endtime'];
			$data['cont'] = $_POST['cont'];
			$data['addtime'] =date('Y-m-d H:i:s',time());
			$data['type'] =2;
			$result = $message->add($data);
			if($result){
				echo "<script>alert('提交成功');";
				echo "window.location.href='/register/index.php/Home/User/appeallist';";
				echo "</script>";
				exit;
			}else{
				echo "<script>alert('提交失败');";
				echo "window.location.href='/register/index.php/Home/User/appeallist';";
				echo "</script>";
				exit;
			}
		}
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