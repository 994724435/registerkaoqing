<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0038)http://endovascology.org/m2016/reg.asp -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>第一届中国脊柱疼痛介入和微创外科学术会议</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel="stylesheet" type="text/css" href="/register/Public/Home/css/global.css">
        <link href="/register/Public/Home/css/register.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/register/Public/Home/css/jquery-1.8.2.min.js"></script>
        
        <script language="javascript" src="/register/Public/Home/css/WdatePicker.js"></script><link href="/register/Public/Home/css/WdatePicker.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="/register/Public/Home/css/workclass.js"></script>
        <script type="text/javascript">
        </script>
<script> 
$(document).ready(function(){
$(".paytype").click(function(){
      $(".paytype").removeClass("red");
      $(this).addClass("red");
       var input = $(this).find('input:radio'); 
            input.prop("checked", true);  
  });
});
</script>
<style type="text/css">
    #registernow{
    display: block;width: 100%; text-align: center;color: #fff;background: #233E7F;height: 3em;line-height: 3em;border-radius: 0.3em;text-align: center;color: #fff;
    }
    .paytype{margin-bottom: 12px;}
    .paytype input{
        height:20px;width: 20px;margin-right: 30px;
    }
    .paytype span{font-size: 14px;}
    .paytype{height: 3em;line-height: 3em;border-radius: 0.3em;width: 100%;border: 1px solid black;}
    .register_title{color: red;}
</style>
    <div id='wx_pic' style='margin:0 auto;display:none;'>
        <img src='http://www.diaoch.cn/register/4.jpg' />
    </div>
    </head>
    <body>
        <div> 
           <form action="" method="POST" name="myform" id="myform">
    <div id="header">
        <a href="javascript:history.go(-1);" class="back"><img src="/register/Public/Home/css/top_left.jpg" width="76" height="90"></a>
        <?php if($email){echo $email;} ?>
        <!--<a href="#" class="home"><img src="/register/Public/Home/css/en.png" width="76" height="90"></a>-->
    </div>
                <div class="register_title"><img src="/register/Public/Home/css/ico_bg.png">在线支付成功</div>
                <!--<form action="" method="post" enctype="multipart/form-data">-->
                <section id="register1">
                    <div class="paytype">
                        <span><?php echo ($message); ?></span>
                    </div>
                  <!--   <div class="paytype">
                        <input id="txt_Email" name="pay" value="3" type="radio"><span>青年/学生代表   0元</span>
                    </div> -->
                    <input type="hidden" name="email" value="<?php echo ($email); ?>">
                    <a href="/register/index.php/Home/Index/user/email/<?php echo $_GET['email']; ?>"><input type="button" value="修改个人信息" id="registernow"></a> <br><br>
                    <!--</form>-->
                </section>
            </form>
        </div>
</body></html>