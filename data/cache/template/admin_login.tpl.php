<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta author="梁钺锋 180193">
<title>登录 - BPM应用管理系统 - 2017</title>
<link rel="stylesheet" type="text/css" href="./css/register-login.css">
</head>
<body>
<div id="box"></div>
<div class="cent-box">
<div class="cent-box-header">
<h1 class="main-title hide">BPM应用管理系统</h1>
<h2 class="sub-title">管理从此大有不同 - 星弘科技</h2>
</div>

<div class="cont-main clearfix">
<div class="index-tab">
<div class="index-slide-nav">
<a href="admin_login.php" class="active">登录</a>
<a href="admin_login.php?act=help">帮助</a>
<div class="slide-bar"></div>				
</div>
</div>

<div class="login form">
<div class="group">
<div class="group-ipt username">
<input type="text" name="username" id="username" class="ipt" placeholder="邮箱地址" required>
</div>
<div class="group-ipt password">
<input type="password" name="password" id="password" class="ipt" placeholder="输入您的登录密码" required>
</div>
</div>
</div>


<div class="group">
<div class="group-ipt verify" >
<br /><p id="loginmsg" style="color: #FF0000;"></p>
</div>
</div>


<div class="button">
<button type="submit" class="login-btn register-btn" id="button" >登录</button>
</div>

<div class="remember clearfix">
<label class="remember-me"><span class="icon"><span class="zt"></span></span><input type="checkbox" name="remember-me" id="remember-me" class="remember-mecheck" checked>记住我</label>
<label class="forgot-password">
<a href="#">忘记密码？</a>
</label>
</div>
</div>
</div>

<div class="footer">
<p>珠海市星弘科技有限公司</p>
Powered by <a href="http://www.centone.info" target="_blank">CENTONE.INC</a> © 2016-2017
</div>

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/admin.js"></script>

<script src='js/login/particles.js' type="text/javascript"></script>
<script src='js/login//background.js' type="text/javascript"></script>
<script src='js/login/jquery.min.js' type="text/javascript"></script>
<script src='js/login/layer/layer.js' type="text/javascript"></script>
<script src='js/login/index.js' type="text/javascript"></script>
<script>
var username="";
if(username = getCookie("cookie_username"))
document.getElementById("username").value=username;

var password="";
if(password = getCookie("cookie_password"))
document.getElementById("password").value=password;

var remember;
if(getCookie("cookie_remember")!=null){
$(".zt").show();
}else{
$(".zt").hide();
}

$("#remember-me").click(function(){
var n = document.getElementById("remember-me").checked;
//		alert(n);
if(n){
$(".zt").show();
}else{
$(".zt").hide();
}
});

$(".login-btn").click(function(){
var username = $("#username").val();
var password = $("#password").val();
var verify = $("#verify").val();

/* 错误信息提示 */
//		layer.msg("登录失败");

chklogin();
})
</script>
</body>
</html>