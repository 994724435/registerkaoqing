<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0040)http://endovascology.org/m2016/login.asp -->
<html><head>
    <div id='wx_pic' style='margin:0 auto;display:none;'>
        <img src='http://www.diaoch.cn/register/4.jpg' />
    </div>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>第一届中国脊柱疼痛介入和微创外科学术会议</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel="stylesheet" type="text/css" href="/register/Public/Home/login/global.css">
        <link href="/register/Public/Home/login/login.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/register/Public/Home/login/jquery-1.8.2.min.js"></script>
        <script type="text/javascript">
            function checkform(myform)
            {
                if (myform.txt_Mobile.value == "") {
                    alert("请输入邮箱！");
                    return false;
                }
                if (myform.txt_Password.value == "") {
                    alert("请输入密码！");
                    return false;
                }
            }
        </script>
        <style type="text/css">
    .registernow{
    display: block;width: 48%; text-align: center;color: #fff;background: #233E7F;height: 3em;line-height: 3em;border-radius: 0.3em;text-align: center;color: #fff;float: left;margin-left: 5px;
    }
    .top{width: 100%;height:58px;background: #254698;text-align: center;margin-top: -5px;}
    .top img{width: 100%;margin-top: 10px;}
    .Logo {text-align:center; width:100%;margin-bottom:10px;}
    .Logo img{width: 100%;height: 140px}
    .back{width: 100%;overflow: hidden;border-top: #990101 2px solid;margin-top: 10px;text-align: center;}
    .back img{height: 30px;margin-top: 6px;margin-right: 5px;}
    .back span{font-size: 28px;font-weight: bold;text-underline: none;}
    .back a{text-decoration: none;}
</style>
    <div id='wx_pic' style='margin:0 auto;display:none;'>
        <img src='http://www.diaoch.cn/register/4.jpg' />
    </div>
    </head>
    <body>
    <div class="top"><IMG src="/register/Public/Home/images/logo9.jpg"></div>
    <div class="Logo"><IMG src="/register/Public/Home/images/logo.jpg"></div>
        <div>
            <form method="post" action="" id="form1" enctype="multipart/form-data">
                <!--                <header>
                    <img src="images/endo_logo.jpg" width="100%" />
                </header>-->
    <!--<div id="header">-->
        <!--<a href="javascript:history.go(-1);" class="back"><img src="/register/Public/Home/login/top_left.jpg" width="76" height="90"></a>-->
       <!--&lt;!&ndash;  <a href="#" class="home"><img src="/register/Public/Home/login/en.png" width="76" height="90"></a> &ndash;&gt;-->
    <!--</div>-->
                <div class="login_title">会员登录</div>
                <section id="login">
                    <div>
                        <span>
                         <img src="/register/Public/Home/css/png_email.png" width="24" height="24"></span>
                        <input type="text" id="txt_Mobile" name="email" placeholder="请输入邮箱"></div>
                    <div>
                        <span>
                            <img src="/register/Public/Home/login/p_password.png" width="24" height="24" alt="密码图标">
                        </span>
                        <input id="txt_Password" name="pwd" type="password" placeholder="请输入密码">
                    </div>
                    <input type="submit" value="登  录" class="registernow">
                    <a href="/register/index.php/Home/Index/index" class="registernow">立即注册</a>
<!-- 
                    <a id="asubmit" class="btnLogin">登录</a>
                    <a href="#" class="btnRegister">注册申请</a> -->
                    <br>
                </section>
            </form>
            <script>
                $('#asubmit').click(function() {
                    $("#form1").submit();
                });
            </script>
        </div>
    <div class="back">
        <a href="/register/index.php/Home/Article/index"><span>返回</span></a>
    </div>

</body></html>