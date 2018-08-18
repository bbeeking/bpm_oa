<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/jquery.js"></script>
<script>
function chksubmit()
{
	var password = $('#password').val();
	var pwd = $('#pwd').val();
	var newpwd = $('#newpwd').val();
	if(trim(password) == '') {
		$('#passwordmsg').html('{L("请填写您的原始密码！")}');
		$('#password').focus();
		return false;
	}
	if(trim(pwd) == '') {
		$('#pwdmsg').html('{L("请输入您的新密码！")}');
		$('#pwd').focus();
		return false;
	}
	if(trim(newpwd) == '') {
		$('#newpwdmsg').html('{L("请输入您的确认密码！")}');
		$('#newpwd').focus();
		return false;
	}
	if(pwd != '' || newpwd != '') {
		if(pwd != newpwd) {
			$('#newpwdmsg').html('{L("两次密码输入不一致，请重新填写！")}');
			$('#newpwd').focus();
			return false;
		}
	}
	$('#submit1').attr('disabled','disabled');
}
</script>
</head>

<body bgcolor="#DDEEF2">
<form name="myform" id="myform" method="post" action="" onsubmit="return chksubmit();">
<table width="98%" border="0" cellspacing="1" cellpadding="2" align="center" bgcolor="#BBDDE5" class="margin_top_10">
  <tr>
    <td bgcolor="#FFFFFF" height="31" colspan="2"><div align="center" class="black_14_bold">{L("密码修改")}</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="25" width="20%"><div align="right"><b>{L("原始密码：")}</b></div></td>
    <td bgcolor="#FFFFFF" height="25" width="80%"><input type="password" name="password" id="password" value="" style="width:150px;" onblur="if(this.value!=''){$('#passwordmsg').html('');}" />&nbsp;&nbsp;<span id="passwordmsg" style="color:#ff0000;"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="25" width="20%"><div align="right"><b>{L("新密码：")}</b></div></td>
    <td bgcolor="#FFFFFF" height="25" width="80%"><input type="password" name="pwd" id="pwd" value="" style="width:150px;" onblur="if(this.value!=''){$('#pwdmsg').html('');}" />&nbsp;&nbsp;<span id="pwdmsg" style="color:#ff0000;"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="25" width="20%"><div align="right"><b>{L("确认密码：")}</b></div></td>
    <td bgcolor="#FFFFFF" height="25" width="80%"><input type="password" name="newpwd" id="newpwd" value="" style="width:150px;" onblur="if(this.value!=''){$('#newpwdmsg').html('');}" />&nbsp;&nbsp;<span id="newpwdmsg" style="color:#ff0000;"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="25" colspan="2"><div align="center"><input type="submit" name="submit" id="submit" value="{L("提交")}" />&nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="{L("重置")}" /></div></td>
  </tr>
</table>
</form>
</body>
</html>