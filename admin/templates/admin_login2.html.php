<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="css/application.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</head>

<body class="controller-account action-login" onkeydown="opera_client(event);">

<div id="top-menu">
    <div id="account">
        <ul><li><a href="">登录</a></li><li><a href="">注册</a></li></ul>    
	</div>
    <ul><li><a href="">主页</a></li>
	<li><a href="">项目</a></li>
	<li><a href="">帮助</a></li></ul>
</div>

<div id="header">
    <div id="quick-search">
        <form action="" method="get">
        <label for="q">
          <a href="" accesskey="4">搜索</a>:
        </label>
        <input accesskey="f" class="small" id="q" name="q" size="20" type="text" />
        </form>
    </div>
    <h1>{L("晨曦-项目管理系统mlight pms")}</h1>
</div>

<div class="nosidebar" id="main">
<div id="sidebar"></div>
<div id="content">
		<div id="login-form">
			<table>
				<tbody>
					<tr>
						<td align="right"><label for="username">{L("登录名:")}</label></td>
						<td>
							<input type="text" name="username" id="username" value="" onblur="if(this.value!=''){showmsg('loginmsg','');}" />
						</td>
					</tr>
					<tr>
						<td align="right"><label for="password">{L("密码:")}</label></td>
						<td>
						<input type="password" name="password" id="password" value="" onblur="if(this.value!=''){showmsg('loginmsg','');}" />&nbsp;
<!--						<input name="remeber" id="remeber" type="checkbox" title="{L('记住密码')}" />-->
						</td>
					</tr>
					<tr>
					    <td></td>
					    <td align="left">
					        <label for="remeber"><input id="remeber" name="remeber" tabindex="4" value="1" type="checkbox" /> {L("保持登录状态")}</label>
					    </td>
					</tr>
				   
				   <!--
					<tr>
			        <td height="30"><div align="right"><strong>验证码：</strong></div></td>
			        <td align="left"><input type="text" name="code" id="code" value="" style="width:100px;" maxlength="4" onblur="if(this.value!=''){showmsg('loginmsg','');}" /><img src="inc/code.php" id="varImg" alt="看不清楚请点击换图" onclick="refurbish();" style="cursor:pointer;" align="absmiddle"></td>
			      </tr>
					-->
					
					<tr>
					    <td align="left">
				            <a href="">{L("忘记密码")}</a>
					    </td>
					    <td align="right">
					        <input name="login" id="login" value="{L('登录 »')}" tabindex="5" type="button" onclick="chklogin();" />
					    </td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<div align="left" id="loginmsg" style="color: #FF0000;"></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
        <div style="clear:both;"></div>
	</div>
</div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by mlight <a href="">MLight</a> © 2013-2015 YueFeng Leung
  </div></div>
</div>
<script>
var username="";
if(username = getCookie("cookie_username"))
document.getElementById("username").value=username;

var password="";
if(password = getCookie("cookie_password"))
document.getElementById("password").value=password;

var rember;
if(getCookie("cookie_remeber")!=null)
document.getElementById("remeber").checked=true;
</script>
</body>
</html>