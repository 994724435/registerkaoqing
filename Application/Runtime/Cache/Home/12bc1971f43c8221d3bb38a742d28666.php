<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!--标准mui.css-->
	<link rel="stylesheet" href="/register/Public/Home/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" href="/register/Public/Home/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/feedback.css" />
	<!--<link rel="stylesheet" type="text/css" href="../css/app.css"/>-->
	<style>
		.head-img {
			width: 50px;
			height: 50px;
			border-radius: 50%;
		}
	</style>
</head>

<body>

<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	<h1 class="mui-title">Person Information</h1>
</header>
<!--右上角弹出菜单-->
<div id="topPopover" class="mui-popover">
	<div class="mui-popover-arrow"></div>
	<div class="mui-scroll-wrapper">
		<div class="mui-scroll">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/Index/index'">首页</a>
				</li>
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/User/clock'">签到</a>
				</li>
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/User/record'">记录</a>
				</li>
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/User/enroll'">请假</a>
				</li>
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/User/appeal'">申诉</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="mui-content">

	<ul class="mui-table-view">
		<li class="mui-table-view-cell mui-media" >
			<a class="mui-navigate-right" href="#" >
				<img class="mui-media-object mui-pull-left head-img" id="head-img" src="<?php echo ($user["userface"]); ?>">
				<div class="mui-media-body">
					<label class="name"><?php echo ($user["nickname"]); ?></label>
					<p class='mui-ellipsis'>欢迎您！</p>
				</div>
			</a>
		</li>
	</ul>

	<form class="mui-input-group" action="" method="post" style="margin-top: 14px;">
		<div class="mui-input-row">
			<label>姓名</label>
			<input type="text" class="mui-input-clear" name="name" value="<?php echo ($user["name"]); ?>" placeholder="请输入用户名">
		</div>
		<div class="mui-input-row">
			<label>手机</label>
			<input type="text" class="mui-input-clear" name="tel" value="<?php echo ($user["tel"]); ?>" placeholder="请输入用户名">
		</div>
		<div class="mui-input-row">
			<label>邮箱</label>
			<input type="text" class="mui-input-clear" name="email" value="<?php echo ($user["email"]); ?>" placeholder="请输入用户名">
		</div>
		<!--<div class="mui-input-row">
            <label>密码</label>
            <input type="password" class="mui-input-password" placeholder="请输入密码">
        </div>-->
		<div class="mui-input-row mui-radio">
			<label>男</label>
			<input  name="sex" type="radio" value="1" <?php if($user["sex"] == 1): ?>checked="checked"<?php endif; ?> >
		</div>
		<div class="mui-input-row mui-radio">
			<label>女</label>
			<input  name="sex" <?php if($user["sex"] == 2): ?>checked="checked"<?php endif; ?> value="2" type="radio">
		</div>
		<div class="mui-input-row">
			<label>部门</label>
			<input type="text" class="mui-input-clear" disabled value="<?php echo ($user["group"]); ?>" placeholder="">
		</div>
		<input type="hidden" name="userid" value="<?php echo ($userid); ?>">
		<div class="mui-button-row">
			<button type="submit" class="mui-btn mui-btn-primary" >确认</button>
			&nbsp;&nbsp;
			<button type="button" class="mui-btn mui-btn-danger" >取消</button>
		</div>

	</form>
</div>
</body>
<script src="/register/Public/Home/js/mui.min.js"></script>
<script>
//	mui.init({
//		swipeBack:true //启用右滑关闭功能
//	});
//	mui('.mui-scroll-wrapper').scroll();
//	mui(document.body).on('tap', '.mui-btn', function(e) {
//		mui(this).button('loading');
//		var check = true;
//		mui(".mui-input-group input").each(function() {
//			//若当前input为空，则alert提醒
////			if(!this.value || this.value.trim() == "") {
////				var label = this.previousElementSibling;
////				mui.alert(label.innerText + "不允许为空");
////				check = false;
////				return false;
////			}
//		}); //校验通过，继续执行业务逻辑
//		if(check){
////			mui.alert('验证通过!')
//		}
//
//		setTimeout(function() {
//			mui(this).button('reset');
//		}.bind(this), 500);
//	});
</script>
</html>