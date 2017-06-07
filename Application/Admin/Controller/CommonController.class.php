<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
		// 所有方法调用之前，先执行
	public function _initialize(){
		if(!$_SESSION['name']){
			echo "<script>alert('请登录');";
	            echo "window.location.href='/register/index.php/Admin/User/login';";
	            echo "</script>";
				exit;
		}
		$user = M('user');
		$result= $user->where(array('name'=>$_SESSION['name']))->select();
		$_SESSION['manager'] =$result[0]['manager'];
		$this->assign('name',$_SESSION['name']);
		$this->assign('manager',$result[0]['manager']);
	}
}