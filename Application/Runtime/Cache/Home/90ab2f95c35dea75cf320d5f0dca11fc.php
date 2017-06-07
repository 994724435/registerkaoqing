<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Hello MUI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="/register/Public/Home/css/mui.min.css">
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/feedback.css" />
</head>

<body>
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<!--<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>-->
	<h1 class="mui-title">Leave</h1>
</header>
<!--下拉刷新容器-->
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
		<!--数据列表-->
		<div id="hiro-pullrefreshCard">
			<?php if(is_array($res)): foreach($res as $key=>$v): ?><div class="mui-card" style="margin-top: 5px;">
				<div class="mui-card-header"><?php echo ($v["addtime"]); ?></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						考勤类型：<label><?php if($v["type"] == 1): ?>签到<?php elseif($v["type"] == 2): ?>签退<?php else: ?>未知<?php endif; ?></label><br/>
						考勤状态：<label><?php if($v["state"] == 1): ?>成功<?php elseif($v["state"] == 2): ?>迟到<?php else: ?>未知<?php endif; ?></label><br>
						考勤地点：<label><?php echo ($v["addr"]); ?></label>
					</div>
				</div>
			   </div><?php endforeach; endif; ?>
		</div>
	</div>
</div>
<script src="/register/Public/Home/js/mui.min.js"></script>
<script>
	mui.init({
		pullRefresh: {
			container: '#pullrefresh',
			down: {
				callback: pulldownRefresh
			},
			up: {
				contentrefresh: '正在加载...',
				callback: pullupRefresh
			}
		}
	});
	/**
	 * 下拉刷新具体业务实现
	 */
	function pulldownRefresh() {
		setTimeout(function() {
//					var table = document.body.querySelector('#hiro-pullrefreshCard');
//					var cells = document.body.querySelectorAll('.mui-card');
//					for (var i = cells.length, len = i + 3; i < len; i++) {
//						var div = document.createElement('div');
//						div.className = 'mui-card';
//						div.innerHTML = '<div class="mui-card-header">ID:' + (i + 1) + '&nbsp;2017年3月27日 星期一</div>'+'<div class="mui-card-content"><div class="mui-card-content-inner">考勤类型：<label>上班签到</label><br/>考勤状态：<label>成功</label></div></div>';
//						//下拉刷新，新纪录插到最前面；
//						table.insertBefore(div, table.firstChild);
//					}
			mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
		}, 1000);
	}

	/**
	 * 上拉加载具体业务实现
	 */
	var count = 0;
	function pullupRefresh() {
		setTimeout(function() {
			mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
			var table = document.body.querySelector('#hiro-pullrefreshCard');
			var cells = document.body.querySelectorAll('.mui-card');
			for (var i = cells.length, len = i ; i < len; i++) {
				var div = document.createElement('div');
				div.className = 'mui-card';
				div.innerHTML = '<div class="mui-card-header">2017年3月27日 星期一</div><div class="mui-card-content"><div class="mui-card-content-inner">考勤类型：<label>上班签到</label><br/>考勤状态：<label>成功</label></div></div>';
				table.appendChild(div);
			}
		}, 1000);
	}

	if (mui.os.plus) {
		mui.plusReady(function() {
			setTimeout(function() {
				mui('#pullrefresh').pullRefresh().pullupLoading();
			}, 1000);

		});
	} else {
		mui.ready(function() {
			mui('#pullrefresh').pullRefresh().pullupLoading();
		});
	}
</script>
</body>
</html>