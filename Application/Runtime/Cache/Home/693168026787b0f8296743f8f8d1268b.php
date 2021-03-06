<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
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
			<div class="class">
				<label id="classResult">考勤记录</label>
			</div>
		</section>
		<section class="query">
			<table>
				<tr>
					<th></th>
					<th>一</th>
					<th>二️</th>
					<th>三</th>
					<th>四</th>
					<th>五</th>
				</tr>
				<tr>
					<td>1</td>
					<td>数学</td>
					<td>英语</td>
					<td>模拟电子</td>
					<td>数字电子</td>
					<td>嵌入式系统化设计与编程</td>
				</tr>
				<tr>
					<td>2</td>
					<td>英语</td>
					<td>语文</td>
					<td>电工基础</td>
					<td>电子技术</td>
					<td>单片机原理及实践</td>
				</tr>
				<tr>
					<td>3</td>
					<td>班会</td>
					<td>电子工艺</td>
					<td>汽车电子技术</td>
					<td>Android开发与实战</td>
					<td>IOS编程开发与实战</td>
				</tr>
				<tr>
					<td>4</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
				</tr>
				<tr>
					<td>5</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
				</tr>
				<tr>
					<td>6</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
				</tr>
				<tr>
					<td>7</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
				</tr>
				<tr>
					<td>8</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
					<td>自习</td>
				</tr>
			</table>
		</section>
	</div>
	<script src="/register/Public/Home/js/mui.min.js"></script>
</body>
</html>