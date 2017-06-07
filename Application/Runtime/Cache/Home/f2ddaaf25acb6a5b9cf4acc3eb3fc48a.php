<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>摇一摇考勤</title>
<link rel="stylesheet" href="/register/Public/Home/css/main.css" />
<style type="text/css">
.demo{width:320px; margin:40px auto 0 auto; }
.hand { width: 190px; height: 300px; margin:0 auto; background: url("/register/Public/Home/images/hand.png") no-repeat; }
.hand-animate { -webkit-animation: hand_move infinite 2s; }
.result { background: #393B3C; border: #2C2C2C 1px solid; box-shadow: inset #4D4F50 0 0 0 1px; border-radius: 10px; color: #fff; padding: 10px; width: 300px; opacity: 0;
        -webkit-transition: all 1s;
           -moz-transition: all 1s;
            -ms-transition: all 1s;
             -o-transition: all 1s;
                transition: all 1s; }
.result-show { opacity: 1; margin-top: 50px; }

 @-webkit-keyframes hand_move {
        0% {
            -webkit-transform: rotate(0);
               -moz-transform: rotate(0);
                -ms-transform: rotate(0);
                 -o-transform: rotate(0);
                    transform: rotate(0); }
        50% {
            -webkit-transform: rotate(15deg);
               -moz-transform: rotate(15deg);
                -ms-transform: rotate(15deg);
                 -o-transform: rotate(15deg);
                    transform: rotate(15deg); }
        100% {
            -webkit-transform: rotate(0);
               -moz-transform: rotate(0);
                -ms-transform: rotate(0);
                 -o-transform: rotate(0);
                    transform: rotate(0); }
    }
</style>
</head>

<body>
<!-- <div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
</div> -->

<div id="main">
 <!--   <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-287.html">HTML5手机重力与方向感应的应用——摇一摇效果</a></h2> -->
  
   <div class="demo">
		<div id="hand" class="hand hand-animate"></div>
		<div id="result" style="text-align: center"></div>
   </div>
  
  <br/>
</div>
<script src="/register/Public/Home/js/shake.js"></script>
<script>
window.onload = function() {
    var myShakeEvent = new Shake({
        threshold: 15
    });

    myShakeEvent.start();

    window.addEventListener('shake', shakeEventDidOccur, false);

    function shakeEventDidOccur () {
		var result = document.getElementById("result");
		result.className = "result";

		result.innerHTML = "<?php if($isshake == 1): ?><a href='/register/index.php/Home/User/record.html'>此时段不能打卡</a><?php elseif($iscome == 1): ?><a href='/register/index.php/Home/User/record.html'>此时段你已经打卡</a><?php else: ?><a href='/register/index.php/Home/User/record.html'>考 勤 成 功 ！</a><?php endif; ?>";
		setTimeout(function(){
            result.className = "result result-show";
        }, 1000);
    }
};
</script>

<!-- <div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div> -->
</body>
</html>