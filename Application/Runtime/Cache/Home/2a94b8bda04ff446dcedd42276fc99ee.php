<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>考勤系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="/register/Public/Home/css/mui.min.css">
    <!--App自定义的css-->
    <!--<link rel="stylesheet" type="text/css" href="../css/app.css"/>-->
    <link rel="stylesheet" type="text/css" href="/register/Public/Home/css/feedback.css" />
    <link rel="stylesheet" type="text/css" href="/register/Public/Home/css/mui.ttf" />
</head>

<body>

<header class="mui-bar mui-bar-nav">
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
    <h1 class="mui-title">首页</h1>
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
    <ul class="mui-table-view mui-grid-view mui-grid-9">
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="#">
            <span class="mui-icon mui-icon-home"></span>
            <div class="mui-media-body">Home</div></a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="/register/index.php/Home/User/clock">
            <span class="mui-icon mui-icon-location"></span>
            <div class="mui-media-body">Today Mark</div></a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="/register/index.php/Home/User/record">
		                    <span class="mui-icon mui-icon mui-icon-compose">
		                    <span class="mui-badge">1</span></span>
            <div class="mui-media-body">My Records</div></a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="/register/index.php/Home/User/enroll">
            <span class="mui-icon mui-icon mui-icon-paperplane"></span>
            <div class="mui-media-body">Leave</div></a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="/register/index.php/Home/User/personCenter">
            <span class="mui-icon mui-icon mui-icon-contact"></span>
            <div class="mui-media-body">Personal Info</div></a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-4"><a href="/register/index.php/Home/User/appeal">
            <span class="mui-icon mui-icon mui-icon-flag"></span>
            <div class="mui-media-body">Appeal</div></a></li>
    </ul>
</div>
</body>
<script src="/register/Public/Home/js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    mui('.mui-scroll-wrapper').scroll();
</script>
</html>