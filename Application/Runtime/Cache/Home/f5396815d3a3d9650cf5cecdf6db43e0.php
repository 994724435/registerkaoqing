<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Hello MUI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!--标准mui.css-->
	<link rel="stylesheet" href="/register/Public/Home/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" href="/register/Public/Home/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/feedback.css" />
	<!--<link rel="stylesheet" type="text/css" href="../css/app.css"/>-->
</head>

<body onload="tick()">

<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	<h1 class="mui-title">考勤</h1>
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
<div class="mui-content" style="text-align: center;">
	<div id="localtime">
		<p id="p1">星期一</p>
		<p id="p2">2017年01月01日</p>
		<p id="p3">00:00:00</p>
	</div>

	<div id="locationMessage"></div>
	<a href="#" id="getLocation">
		<button id='toastBtn' type="button" class="mui-btn mui-btn-block mui-btn-blue mui-btn-outlined" style="margin-top: 10px;">一键签到</button>
	</a>
</div>
</body>
<script type="text/JavaScript" src="http://api.map.baidu.com/api?v=2.0&ak=BvQ15ocU40beCThnOETPblie2LVaCqzG"></script>
<script src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
<script src="/register/Public/Home/js/mui.min.js"></script>
<script>
	var LOCATIONMESSAGE;
	mui.init({
		swipeBack:true //启用右滑关闭功能
	});
	mui('.mui-scroll-wrapper').scroll();
	wx.config({
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
	nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
		'checkJsApi',
		'openLocation',
		'getLocation'
	]
	});
	wx.ready(function () {
// 获取当前地理位置
		document.querySelector('#getLocation').onclick = function () {
			wx.getLocation({
				success: function (res) {
					var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
					var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
					var speed = res.speed; // 速度，以米/每秒计
					var accuracy = res.accuracy; // 位置精度
					window.location.href='http://www.diaoch.cn/register/index.php/Home/User/shake/latitude/'+latitude+'/longitude/'+longitude;
					//				alert(JSON.stringify(res));
				},
				cancel: function (res) {
					alert('用户拒绝授权获取地理位置');
				}
			});
		};
	});
	// 动态时间显示-start
	function showLocale(objD)
	{
		var str,colorhead,colorfoot;
		var yy = objD.getYear();
		if(yy<1900) yy = yy+1900;
		var MM = objD.getMonth()+1;
		if(MM<10) MM = '0' + MM;
		var dd = objD.getDate();
		if(dd<10) dd = '0' + dd;
		var hh = objD.getHours();
		if(hh<10) hh = '0' + hh;
		var mm = objD.getMinutes();
		if(mm<10) mm = '0' + mm;
		var ss = objD.getSeconds();
		if(ss<10) ss = '0' + ss;
		var ww = objD.getDay();
		// if ( ww==0 ) colorhead="<font color=\"#FF0000\">";
		// if ( ww > 0 && ww < 6 ) colorhead="<font color=\"#373737\">";
		// if ( ww==6 ) colorhead="<font color=\"#008000\">";
		if (ww==0) ww="星期日";
		if (ww==1) ww="星期一";
		if (ww==2) ww="星期二";
		if (ww==3) ww="星期三";
		if (ww==4) ww="星期四";
		if (ww==5) ww="星期五";
		if (ww==6) ww="星期六";
		// colorfoot="</font>";
		str = '<p id="p1">' + ww + '</p><p id="p2">' + yy + '年' + MM + '月' + dd + '日' + '</p><p id="p3">' + hh + ':' + mm + ':' + ss + '</p>';
		//alert(str);
		return str;
	}
	function tick()
	{
		var today;
		today = new Date();
		document.getElementById("localtime").innerHTML = showLocale(today);
		window.setTimeout("tick()", 1000);
	}
	// 动态时间显示-end

</script>
</html>