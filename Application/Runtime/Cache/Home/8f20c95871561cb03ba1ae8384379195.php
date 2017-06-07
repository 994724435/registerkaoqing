<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title></title>
	<!--标准mui.css-->
	<link rel="stylesheet" href="/register/Public/Home/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/feedback.css" />
	<style>
		table {
			table-layout: fixed;
			width: 100%;margin-bottom: 10px; }

		td {
			padding: 5px;
			/*width:100px;*/
			text-align: center;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			-o-text-overflow: ellipsis; }
	</style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	<h1 class="mui-title">Appeal</h1>
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

	<div class="mui-content-padded">
		<p>申诉表：</p>
		<table>
			<tr>
				<!--<th>id</th>-->
				<th>申诉时间</th>
				<th>内容</th>
				<th>状态</th>
			</tr>
			<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
				<td><?php echo ($v["addtime"]); ?></td>
				<td><?php echo ($v["cont"]); ?></td>
				<td><?php if($v["state"] == 2): ?>不通过<?php elseif($v["state"] == 1): ?>通过<?php else: ?>待审核<?php endif; ?></td>
			</tr><?php endforeach; endif; ?>
		</table>
		<form class="mui-input-group" action="" method="post" enctype="multipart/form-data">
			<div class="mui-input-row">
				<label>疑问日期：</label>
				<input type="date" name="datetime" class="mui-input-clear" placeholder="点击输入" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
			</div>

			<div class="mui-input-row">
				<textarea id='leaveDetails' class="mui-input-clear question" placeholder="请完整描述你的申诉内容..."></textarea>
			</div>
			<div class="mui-button-row">
				<button type="submit" class="mui-btn mui-btn-primary" >确认</button>&nbsp;&nbsp;
				<button type="button" class="mui-btn mui-btn-danger" onclick="return false;">取消</button>
			</div>
		</form>
	</div>
	<script src="/register/Public/Home/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});

//		mui(document.body).on('tap', '.mui-btn', function(e) {
//			mui(this).button('loading');
//			var check = true;
//			mui(".mui-input-group input").each(function() {
//				//若当前input为空，则alert提醒
//				if(!this.value || this.value.trim() == "") {
//					var label = this.previousElementSibling;
//					mui.alert(label.innerText + "不允许为空");
//					check = false;
//					return false;
//				}
//			}); //校验通过，继续执行业务逻辑
//			if(check){
//				mui.alert('验证通过!')
//			}
//
//			setTimeout(function() {
//				mui(this).button('reset');
//			}.bind(this), 500);
//		});


		mui('.mui-scroll-wrapper').scroll();

	</script>
</body>

</html>