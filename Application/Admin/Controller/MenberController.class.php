<?php
namespace Admin\Controller;
use Think\Controller;
class MenberController extends CommonController {
	public function select(){
        $menber = M('menber');
        if($_GET['name']){
            $map['name']=array('like','%'.$_GET['name'].'%');
            $users= $menber->where($map)->select();
        }else{
            $users= $menber->select();
        }
        $this->assign('users',$users);
        $this->display();
    }


    public function userupdate(){
        $menber = M('menber');
        if($_POST){
            $data['name'] =$_POST['name'];
            $data['address'] =$_POST['address'];
            $data['sex'] =$_POST['sex'];
            $data['ismanager'] =$_POST['ismanager'];
            $data['group'] =$_POST['group'];
            $result = $menber->where(array('id'=>$_GET['id']))->save($data);
            if($result){
                echo "<script>alert('更新成功');window.location.href = '/register/index.php/Admin/Menber/select';</script>";exit();
            }else{
                echo "<script>alert('更新失败');window.location.href = '/register/index.php/Admin/Menber/select';</script>";exit();
            }
        }
        $user= $menber->where(array('id'=>$_GET['id']))->select();
        $this->assign('user',$user[0]);
        $this->display();
    }

//    删除用户
    public function userdelete(){
        $menber = M('menber');
        $result = $menber->where(array('id'=>$_GET['id']))->delete();
        if($result){
            echo "<script>window.location.href = '/register/index.php/Admin/Menber/select';</script>";exit();
        }else{
            echo "<script>alert('更新失败');window.location.href = '/register/index.php/Admin/Menber/select';</script>";exit();
        }
    }

    // 请假列表
    public function usermessage(){
        $message = M('message');
        $result = $message->where(array('type'=>1))->order('state asc')->select();
        $this->assign('res',$result);
        $this->display();
    }

    // 不通过理由
    public function usermessagereson(){
        $message = M('message');
        if($_POST){
            $result = $message->where(array('id'=>$_GET['id']))->save(array('passreson'=>$_POST['passreson'],'state'=>2,'manager'=>$_SESSION['name']));
            $res= $message->where(array('id'=>$_GET['id']))->select();
            if($res[0]['type']==1){
                echo "<script>window.location.href = '/register/index.php/Admin/Menber/usermessage';</script>";exit();
            }else{
                echo "<script>window.location.href = '/register/index.php/Admin/Menber/appeallist';</script>";exit();
            }

//            echo "<script>window.location.href = '/register/index.php/Admin/Menber/usermessage';</script>";exit();
        }

//        $this->assign('res',$result);
        $this->display();
    }

    // 请假操作
    public function usermessagecontroll(){
        if($_GET['id']){
            $message = M('message');
            $message->where(array('id'=>$_GET['id']))->save(array('state'=>$_GET['state'],'manager'=>$_SESSION['name']));
            $res= $message->where(array('id'=>$_GET['id']))->select();
            if($res[0]['type']==1){
                echo "<script>window.location.href = '/register/index.php/Admin/Menber/usermessage';</script>";exit();
            }else{
                echo "<script>window.location.href = '/register/index.php/Admin/Menber/appeallist';</script>";exit();
            }

        }
    }

    public function scope(){
        $sets =M('sets');
        if($_POST){
            $sets->where(array('id'=>5))->save(array('cont'=>$_POST['longitude']));
            $sets->where(array('id'=>6))->save(array('cont'=>$_POST['latitude']));
            $sets->where(array('id'=>7))->save(array('cont'=>$_POST['scope']));
            echo "<script>window.location.href='/register/index.php/Admin/Menber/scope';</script>";
        }
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
        $this->assign('longitude',$longitude);
        $this->assign('latitude',$latitude);
        $this->assign('scope',$scope);
        $this->display();
    }

    //申诉列表
    public function appeallist(){
        $message = M('message');
        $result = $message->where(array('type'=>2))->order('state asc')->select();
        $this->assign('res',$result);
        $this->display();
    }
}



 ?>