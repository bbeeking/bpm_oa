<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("网站后台管理系统")}</title>
<link href="./css/application.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
<style>

a.selected {
    background-color: #9DB9D5;
    border-radius: 2px 2px 2px 2px;
    color: #FFFFFF;
    line-height: 1.7em;
    margin-left: -2px;
    padding: 1px 3px 2px 2px;
}

body,input,table,form,div,li,ul {
margin:0px;
font-size:12px;
}
.divnone {
display:none;
}
.divblock {
display:block;
}
.searchMenu {
cursor:pointer;
hight:20px;
}
.liimg {
margin-left:-27px;
*margin-left:13px;
_margin-left:13px;
background: url(images/menu_arrow.gif) no-repeat 0px 3px;
padding-left:13px;
_padding-left:13px;
*padding-left:13px;
list-style-type:none;
}
.openitem {
cursor:pointer;
background:url(images/menu_minus.gif) no-repeat 0px 3px;
padding-left:13px;
color:#335B64;
font-weight:bold;
padding-top:1px;
}
.closeitem {
cursor:pointer;
background:url(images/menu_plus.gif) no-repeat 0px 3px;
padding-left:13px;
color:#335B64;
font-weight:bold;
padding-top:1px;
}
a {
text-decoration:none;
color:#335B64;
}
a:hover {
text-decoration:underline;
color:#FF8000;
}
a:active {
text-decoration:none;
color:#FF8000;
}
.exit_item {
background: url(images/menu_arrow.gif) no-repeat 0px 3px;
list-style-type:none;
padding-left:13px;
_padding-left:0px;
*padding-left:0px;
}
.liimg{
	line-height:16px;
}
</style>

<script language="javascript">

//2013-09-12日增加点击a标签的时候，移除所有的selected样式类,同时当前的对象增加selected样式
//$(document).ready(function(){  
//	$('a').click(function(){
//		$("a").removeClass("selected");
//		$(this).addClass('selected');	
//	});
//});

var iId = "";
//点击左边导航条时，更改文字样式。
function ClickFun(id)
{
	if(iId == id)
		return false;
	if(iId != "")
	{
		var sHtml = document.getElementById(iId).innerHTML;
		sHtml = sHtml.replace(/<\/?[^>]*>/g,''); //去除HTML tag
		document.getElementById(iId).innerHTML = sHtml;
	}
//	alert($(this));return;
	$(this).addClass('selected');
	var sHtml = document.getElementById(id).innerHTML;
	document.getElementById(id).innerHTML = "<div style='background-color:#B8DBA5;'><strong><font color='#FF8000'>" + sHtml + "</font></strong></div>";
	iId = id;//原来的ID
}

</script>
</head>
<body class="ptrn_a" bgcolor="#EEEEEE">
<table width="100%">
  <tr>
  	<td id="searchMenu" >
  		<input type="text" name="searchMenu" id="searchMenu" value=""/>
  	</td>
  </tr>
  <tr>
    <td>
	  <div style="margin-left:5px;">
	  	{$menu}
	    </ul></div>
		<li class="exit_item"><a href="password.php" onclick="ClickFun('updatepasswd');" target="right" id="updatepasswd">{L("修改密码")}</a></li>
		<li class="exit_item"><a href="logout.php" onclick="ClickFun('logout');" id="logout">{L("安全退出")}</a></li>
	  </div>
    </td>
  </tr>
</table>
</body>
</html>