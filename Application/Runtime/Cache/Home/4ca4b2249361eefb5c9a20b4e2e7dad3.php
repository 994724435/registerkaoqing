<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>科室查询</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/style.css">
</head>
<body>
<!-- 导航栏 -->
<header id="header" class="mui-bar mui-bar-nav">
	<h1 class="mui-title">广东省大型公司签到考勤系统</h1>
	<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="javascript:history.go(-1)"><span class="mui-icon mui-icon-left-nav"></span></a>
	<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
</header>
<!-- 右上角弹出菜单 -->
<div id="topPopover" class="mui-popover">
	<div class="mui-popover-arrow"></div>
	<div class="mui-scroll-wrapper">
		<div class="mui-scroll">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="query.html">我要查询</a>
				</li>
				<li class="mui-table-view-cell"><a href="vote.html">我要投票</a>
				</li>
				<li class="mui-table-view-cell"><a href="rate.html">我要评价</a>
				</li>
				<li class="mui-table-view-cell"><a href="enroll.html">我要报名</a>
				</li>
				<li class="mui-table-view-cell"><a href="payment.html">我要缴费</a>
				</li>
				<li class="mui-table-view-cell"><a href="personCenter.html">个人中心</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<a href="enroll.html">
				<div class="class">
					<label id="classResult">点次请假</label>
				</div>
			</a>
		</section>
		<section class="rate_group">
		<h3>请假记录</h3>
			<table>
				<tr>
					<th>课程</th>
					<th>地点</th>
					<th>状态</th>
				</tr>
				<tr>
					<td>嵌入式系统开发</td>
					<td>科A401</td>
					<td>申请中</td>
				</tr>
				<tr>
					<td>单片机程序设计</td>
					<td>科A406</td>
					<td>通过</td>
				</tr>
				<tr>
					<td>原子弹开发与深究</td>
					<td>科A309</td>
					<td>通过</td>
				</tr>
			</table>
	</div>
	<script src="/register/Public/Home/js/mui.min.js"></script>
</body>
</html>