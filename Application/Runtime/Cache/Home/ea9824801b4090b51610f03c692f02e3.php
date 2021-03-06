<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>成绩查询</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<a href="https://www.baidu.com/">
			<div class="class">
				<label id="classResult">摇一摇</label>
			</div>
			</a>
		</section>
		<section class="rate_group">
			<table>
				<tr>
					<th>课程</th>
					<th>分数</th>
					<th>绩点</th>
				</tr>
				<tr>
					<td>语文</td>
					<td><span>100</span>分</td>
					<td><span>4.0</span></td>
				</tr>
				<tr>
					<td>电子工艺</td>
					<td><span>39</span>分</td>
					<td><span>0</span></td>
				</tr>
				<tr>
					<td>电工基础</td>
					<td><span>90</span>分</td>
					<td><span>4.0</span></td>
				</tr>
			</table>
	</div>
	<script src="js/mui.min.js"></script>
</body>
</html>