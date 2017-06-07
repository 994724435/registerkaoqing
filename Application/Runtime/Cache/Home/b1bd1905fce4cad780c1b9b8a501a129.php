<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>申诉记录</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/register/Public/Home/css/style.css">
</head>
<body>
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
				<li class="mui-table-view-cell"><a onClick="window.location.href='/register/index.php/Home/User/appeallist'">申诉</a>
				</li>
			</ul>
		</div>
	</div>
</div>
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<a href="/register/index.php/Home/User/appeal.html">
				<div class="class">
					<label id="classResult">点次申诉</label>
				</div>
			</a>
		</section>
		<section class="rate_group">
			<br>
		<h3>申诉记录</h3>
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
	</div>
	<script src="/register/Public/Home/js/mui.min.js"></script>
</body>
</html>