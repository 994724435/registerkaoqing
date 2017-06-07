<?php

namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
	
    public function main(){
        $user = M('user');
//        if($_SESSION['manager']==2){
            $user_res= $user->select();
//        }
        $this->assign('re',$user_res);
        $this->display();
    }

    // 密码修改
    public function userpwd(){
        $user = M('user');
        if($_POST){
            $data['password'] =$_POST['psd1'];
            $data['manager'] =$_POST['manager'];
            $result = $user->where(array('id'=>$_GET['id']))->save($data);
            if($result){
                echo "<script>alert('修改成功');window.location.href='/register/index.php/Admin/Index/main';</script>";
            }
        }
        $res= $user->where(array('id'=>$_GET['id']))->select();
        $this->assign('re',$res[0]);
        $this->display();
    }

    // 审核通过操作
    public function userdetail(){
        $user = M('log');
        $res= $user->where(array('id'=>$_GET['id']))->save(array('state'=>2,'manager'=>$_SESSION['name']));
            if ($res) {
        echo "<script>window.location.href='/register/index.php/Admin/Index/userlist';</script>";
            }else{
        echo "<script>alert('通过失败');window.location.href='/register/index.php/Admin/Index/userlist';</script>";
            }
    }
    // 审核不通过操作
    public function userdelete(){
        $user = M('log');
        $res= $user->where(array('id'=>$_GET['id']))->save(array('state'=>3,'manager'=>$_SESSION['name']));
        if ($res) {
            echo "<script>window.location.href='/register/index.php/Admin/Index/userlist';</script>";
        }else{
            echo "<script>alert('操作失败');window.location.href='/register/index.php/Admin/Index/userlist';</script>";
        }
    }
    // 签到审批
    public function userlist(){
        $log = M('log');
        $result = $log->select();
        $result_ymd = $log->group('addymd')->count();
        $menber =M('menber');
        $user= $menber->count();

        $late = 0;
        $normal=0;
        $all =0;
        $buka =0;
        foreach($result as $k=>$v){
            $all =$all+1;
            if($v['state']==1){
                $normal =$normal +1;
            }
            if($v['state']==2){
                $late =$late +1;
            }
            if($v['state']==3){
                $buka =$buka +1;
            }
        }
        $queqing = $user*2*$result_ymd-$all;
        $this->assign('all',$all);
        $this->assign('queqing',$queqing);
        $this->assign('normal',$normal);
        $this->assign('late',$late);
        $this->assign('buka',$buka);
        $this->assign('res',$result);
        $this->display();
    }

    // 签到审批
    public function usertodaylist(){
        $log = M('log');
        $date = date('Y-m-d',time());
        $condtion['addtime'] =array('like',"%$date%");
        $result = $log->where($condtion)->select();
        $menber =M('menber');
        $user= $menber->count();
        $late = 0;
        $normal=0;
        $all =0;
        $buka =0;
        foreach($result as $k=>$v){
            $all =$all+1;
            if($v['state']==1){
                $normal =$normal +1;
            }
            if($v['state']==2){
                $late =$late +1;
            }
            if($v['state']==3){
                $buka =$buka +1;
            }
        }
        $queqing = $user*2-$all;
        $this->assign('all',$all);
        $this->assign('queqing',$queqing);
        $this->assign('buka',$buka);
        $this->assign('normal',$normal);
        $this->assign('late',$late);

        $this->assign('res',$result);
        $this->display();
    }

    // 导出excel
    public function userexcel(){
        $log = M('log');
        if($_GET['istoday']==1){
            $date = date('Y-m-d',time());
            $condtion['addtime'] =array('like',"%$date%");
            $result = $log->where($condtion)->select();
        }else{
            $result = $log->select();
        }
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename="test_excel";
//        $headArr=array("用户名","密码");
        $headArr=array("ID","员工ID","微信昵称","打卡时间","state","longitude","latitude","打卡地点","manager","姓名");
        $this->getExcel($filename,$headArr,$result);
    }

    public function out(){
//        $data=array(
//            array('username'=>'zhangsan','password'=>"123456"),
//            array('username'=>'lisi','password'=>"abcdefg"),
//            array('username'=>'wangwu','password'=>"111111"),
//            );
        $user = M('user');
        $data = $user->select();
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename="test_excel";
//        $headArr=array("用户名","密码");
        $headArr=array("ID","邮箱","密码","姓名","拼音","单位","职称","地址","邮编","电话","学分","住宿","注册时间","支付");
        $this->getExcel($filename,$headArr,$data);
    }
    private function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }
        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

    // 审批通过
    public function useroklist(){
        $log = M('log');
        $result = $log->where(array('state'=>2))->select();
        $this->assign('res',$result);
        $this->display();
    }

    // 审批不通过
    public function userunlist(){
        $log = M('log');
        $result = $log->where(array('state'=>3))->select();
        $this->assign('res',$result);
        $this->display();
    }

    // 手动删除
    public function userdeletelist(){
        $log = M('log');
        $res = $log->where(array('id'=>$_GET['id']))->delete();
        if ($res) {
            echo "<script>window.location.href='/register/index.php/Admin/Index/userlist';</script>";
        }else{
            echo "<script>alert('操作失败');window.location.href='/register/index.php/Admin/Index/userlist';</script>";
        }
    }

    // 添加管理员
    public function useradd(){
          if ($_POST) {
            $user = M('user');
            $data['password'] =$_POST['psd1'];
            $data['name']   = $_POST['name'];
            $data['manager']   = $_POST['manager'];
            $data['addtime']  = date('Y-m-d H:i:s',time());
            $user_res= $user->where(array('name'=>$data['name']))->select();
            if($user_res[0]['id']){
 echo "<script>alert('用户名已存在');window.location.href='/register/index.php/Admin/Index/main';</script>";exit();
            }
            $res= $user->add($data);
            if ($res) {
        echo "<script>alert('添加成功');window.location.href='/register/index.php/Admin/Index/main';</script>";
            }else{
        echo "<script>alert('添加失败');window.location.href='/register/index.php/Admin/Index/main';</script>";
            }
            
        }
        $this->display();
    }

    /**
     *  补签
     */
    public function addsign(){
        $member = M('menber');
        $result_member = $member->select();
        if ($_POST) {
            $log = M('log');
            $data['userid']   = $_POST['userid'];
            $res_user= $member->where(array('id'=>$data['userid']))->select();
            $data['nickname']  = $res_user[0]['nickname'];
            $data['name']  = $res_user[0]['name'];
            $data['manager']   = $_SESSION['name'];
            $data['addtime']  = $_POST['addtime'];
            $data['state']  = $_POST['state'];
            $data['addr']  = $_POST['addr'];
            $res= $log->add($data);
            if ($res) {
                echo "<script>alert('补卡成功');window.location.href='/register/index.php/Admin/Index/addsign';</script>";
            }else{
                echo "<script>alert('添加失败');window.location.href='/register/index.php/Admin/Index/addsign';</script>";
            }
        }
        $this->assign('member',$result_member);
        $this->display();
    }

    public function userinfo()
    {
        $access_token = $this->gettoken();
        $token =$access_token['access_token'];
        $url ="https://api.weixin.qq.com/cgi-bin/user/get?access_token=$token";
        $users =  $this->getlists($url);
        
        print_r($users);die;
        //获取微信端的用户列表 open_id
        //录入数据库
        foreach($userinfo as $key=>$val){
            $data[$key]['open_id'] = $userinfo[$key]->openid;
            $data[$key]['nickname'] = $userinfo[$key]->nickname;
            $data[$key]['sex'] = $userinfo[$key]->sex;
            $data[$key]['province'] = $userinfo[$key]->province;
            $data[$key]['headimgurl'] = $userinfo[$key]->headimgurl;
            $data[$key]['subscribe_time'] = $userinfo[$key]->subscribe_time;
        }

        //有就更新  无就添加
        foreach($data as $k1=>$v1){
            $res = $userobj->where(array('open_id'=>$data[$k1]['open_id']))->select();
            if($res[0]['id']){
                $result = $userobj->where(array('open_id'=>$data[$k1]['open_id']))->save($data[$k1]);
            }else{
                $result =$userobj->add($data[$k1]);
            }
        }
        $user_result = $userobj->select();
        $this->assign('user',$user_result);
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

    // 信息发送

    public function sendmsg($openid,$type){
        $access_token =$this->gettoken();
        $access_token=$access_token['access_token'];
        $formwork = '  {
           "touser":"'.$openid.'",
           "template_id":"'.$type.'",
           "url":"http://www.diaoch.cn/register/index.php/Home/User/clock/openid/'.$openid.'",
           "data":{
                   "first": {
                       "value":"上班打卡",
                       "color":"#173177"
                   }
           }
       }';
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$formwork);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function sendall(){
        //获取access_token
        $openid ="o2MKus4RU3wyRDzn9SzamKKMcCac";
        $res = $this->sendmsg($openid,$this->gettype(1));
        print_r($res);die;
    }

    private function gettype($type){  // 1,签到  2,签退
        if($type==1){
            return "_D1xCv7mReuQR1zwQhwtl954ZotDb9jP6gv-xg3YUBM";
        }elseif($type==2){
            return "jujuWXArtkw5EaXSFfiVBK7GVDrBp8_s53h2wah8OGc";
        }
    }

    public function send(){
        if($_GET['id']){
            //保存所有的openid
            $menber =M('menber');
            $all_openid =$menber->field('openid')->select();
            //把上面设置的信息循环发送到所有的公众号关注的用户手里
            foreach ($all_openid as  $key=>$value) {
                $this->sendmsg($value['openid'],$this->gettype($_GET['id']));
                print_r('用户'.$value['openid'].'ok<br>');
                echo '执行完毕';
            }
            echo "<script>alert('提醒成功');window.location.href='/register/index.php/Admin/Index/send';</script>";
        }
        $this->display();
    }

    public function sets(){   // 日期规则设置
        $sets =M('sets');
        if($_POST){
            $result= $sets->where(array('id'=>1))->save(array('cont'=>$_POST['cont']));
            echo "<script>window.location.href='/register/index.php/Admin/Index/sets';</script>";
        }
        $res= $sets->where(array('id'=>1))->select();
        $this->assign('res',$res[0]);
        $this->display();
    }
    // 时间设置
    public function setstime(){
        $sets =M('sets');
        if($_POST){
            $sets->where(array('id'=>2))->save(array('cont'=>$_POST['earlytime']));
            $sets->where(array('id'=>3))->save(array('cont'=>$_POST['morning']));
            $sets->where(array('id'=>4))->save(array('cont'=>$_POST['aftern']));
            echo "<script>window.location.href='/register/index.php/Admin/Index/setstime';</script>";
        }
        $map['id']=array('in','2,3,4');
        $res= $sets->where($map)->select();
        $this->assign('earlytime',$res[0]);
        $this->assign('morning',$res[1]);
        $this->assign('aftern',$res[2]);
        $this->display();
    }

    // 编辑签到
    public function usereditelist(){
        $log =M('log');
        $res = $log->where(array('id'=>$_GET['id']))->select();
        if($_POST){
//            $data['userid']   = $_POST['userid'];
//            $member =M('menber');
//            $res_user= $member->where(array('id'=>$data['userid']))->select();
//            $data['nickname']  = $res_user[0]['nickname'];
//            $data['name']  = $res_user[0]['name'];
            $data['manager']   = $_SESSION['name'];
            $data['addtime']  = $_POST['addtime'];
            $data['state']  = $_POST['state'];
            $data['addr']  = $_POST['addr'];
            $data['latitude']  = $_POST['latitude'];
            $data['longitude']  = $_POST['longitude'];
            $log->where(array('id'=>$_GET['id']))->save($data);
            echo "<script>window.location.href='/register/index.php/Admin/Index/usertodaylist';</script>";
        }
        $this->assign('res',$res[0]);
        $this->display();
    }
}