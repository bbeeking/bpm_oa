<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
<?php include "../templates/header.html.php"?>
<!-- 样式控制 header end -->

<!-- enhanced select 控制下拉列表多选 -->
            <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />
            
        <!-- datepicker -->
            <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
<!-- nice form elements -->
            <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />
<!-- enhanced select -->
            <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />
            
    </head>
<body class="ptrn_a">
<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>

<!-- 加载颜色风格选择器 -->
<?php include "../templates/style_switcher.html.php"?> 

<div id="maincontainer" class="clearfix">

<!-- 顶部导航栏 top start -->
            <?php include "../top.php"?>
            <!-- 顶部导航栏 top end -->

            <!-- 主加载程序main content start -->
            <div id="contentwrapper">
                <div class="main_content">
<nav>
<div id="jCrumbs" class="breadCrumb module">
<ul>
<li>
<a href="#"><i class="icon-home"></i></a>
</li>
<li>
系统设置
</li>
<li>管理员配置</li>
</ul>
</div>
</nav>

                    <form action="user_post.php?<?php if($userid>0) { ?>type=edit<?php } else { ?>type=add<?php } ?>" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return chksubmit()">
                    
                    <div class="row-fluid">
<div class="span12">
<h3 class="heading"><?php if($userid>0) { ?><?php echo L("修改管理员");?><?php } else { ?><?php echo L("添加管理员");?><?php } ?></h3>
<div class="row-fluid">

<fieldset>
<div class="control-group formSep">
<label for="gid" class="control-label"><span class="f_req">*</span>群组</label>
<div class="controls">
<?php echo get_section('gid',$group,$result['a_gid'],$ary_first=array(0=>L("请选择")),'gid',$js);?>
<span id="gidmsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>登陆账号</label>
<div class="controls">
<input type="text" name="username" id="username" onblur="if(this.value!=''){$('#usernamemsg').html('');}" value="<?php echo $result['a_account'];?>" />
<span id="usernamemsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="realname" class="control-label"><span class="f_req">*</span>姓名</label>
<div class="controls">
<input type="text" name="realname" id="realname" value="<?php echo $result['a_username'];?>" maxlength="18" onblur="if(this.value!=''){$('#realnamemsg').html('');}" />
<span id="realnamemsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="department" class="control-label">部门</label>
<div class="controls">
<!--
<input type="text" name="department" id="department" value="<?php echo $result['a_department'];?>" maxlength="28" onblur="if(this.value!=''){$('#departmentmsg').html('');}" />
-->
<?php echo get_section("department",$departmentAry,$result['a_department'],'',"department");?>
<span id="departmentmsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="number" class="control-label">工号</label>
<div class="controls">
<input type="text" name="number" id="number" value="<?php echo $result['a_number'];?>" maxlength="28" onblur="if(this.value!=''){$('#numbermsg').html('');}" />
<span id="numbermsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="tel" class="control-label">电话</label>
<div class="controls">
<input type="text" name="tel" id="tel" value="<?php echo $result['a_tel'];?>" maxlength="20" onblur="if(this.value!=''){$('#telmsg').html('');}" />
<span id="telmsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="password" class="control-label"><span class="f_req">*</span>密码</label>
<div class="controls">
<input type="password" name="pwd" id="pwd" value="<?php echo $result['a_password'];?>" onblur="if(this.value!=''){$('#pwdmsg').html('');}" />
<span id="pwdmsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="password" class="control-label"><span class="f_req">*</span>确认密码</label>
<div class="controls">
<input type="password" onblur="if(this.value!=''){$('#newpwd').html('');}" id="newpwd" name="newpwd" value="<?php echo $result['a_password'];?>" />
<span id="newpwdmsg" class="help-block" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="language" class="control-label">语言种类</label>
<div class="controls">
<?php echo get_section('language',$LanguageAry,$result['a_language'],'','language');?>
</div>
</div>
<div class="control-group formSep">
<label for="ispermit" class="control-label"><span class="f_req">*</span>是否禁止登陆</label>
<div class="controls">
<input name="ispermit" id="ispermit" type="radio" value="1" <?php if($result['a_ispermit'] == '1') { ?>checked<?php } ?> /><?php echo L("是");?>
      											<input type="radio" name="ispermit" id="ispermit" value="0" <?php if($result['a_ispermit'] != '1') { ?>checked<?php } ?> /><?php echo L("否");?>
</div>
</div>
<div class="control-group">
<div class="controls">
<input type="hidden" name="aid" id="aid" value="<?php echo $result['a_id'];?>" style="display:none;" />
<button class="btn btn-gebo" type="submit" name="submit1" id="submit1">提交</button>
<input type="button" name="go_url" value="<?php echo L("返回");?>" onclick="window.location.href='user_list.php';" />
<input type="reset" name="reset1" id="reset1" value="<?php echo L("重置");?>" />
</div>
</div>
</fieldset>

</div>

</div>
</div>
</form>

                </div>
            </div>
            
            
            
<!-- 左侧菜单导航栏 sidebar start -->
            <?php include "../sidebar.php"?>
            <!-- 左侧菜单导航栏 sidebar end -->
            
<!-- 尾部js加载 footer start -->
<?php include "../templates/footer.html.php"?>
<!-- 尾部js加载 footer end -->

<!-- bootstrap plugins -->
<script src="../templates/js/bootstrap.plugins.min.js"></script>
<!-- autosize textareas -->
<script src="../templates/js/forms/jquery.autosize.min.js"></script>
<!-- enhanced select -->
<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
<!-- user profile functions -->
<script src="../templates/js/gebo_user_profile.js"></script>
<!-- user profile functions -->
<script src="../templates/js/pms_forms.js"></script>
 <!-- masked inputs 输入格式插件 -->
            <script src="../templates/js/forms/jquery.inputmask.min.js"></script>


<!-- 脚本js控制 start -->

<!-- 控制检测表单数据 -->
<script src="../js/common.js"></script>

<script language="javascript">
function chksubmit()
{
var gid = $('#gid').val();
var username = $('#username').val();
var realname = $('#realname').val();
var pwd = $('#pwd').val();
var newpwd = $('#newpwd').val();
var id = $('#id').val();
if(gid == '0') {
$('#gidmsg').html('<?php echo L("请选择所属群组！");?>');
$('#gid').focus();
return false;
}
if(trim(username) == '') {
$('#usernamemsg').html('<?php echo L("请填写登陆账户！");?>');
$('#username').focus();
return false;
}
else {
var chkusername = /^(\w|_|-){2,30}$/;
if(!chkusername.test(username)) {
$('#usernamemsg').html('<?php echo L("登陆账户填写错误，登陆账号由字母或数字或");?>_-<?php echo L("符号组成，字符限制在");?>2-30<?php echo L("位。");?>');
$('#username').focus();
return false;
}
else {
$('#usernamemsg').html('<?php echo L("正在检测，请稍后...");?>');
var ac_str = GetRequest('ajax.php?type=user&username='+encodeURI(username));
if(ac_str == '2') {
$('#usernamemsg').html('');
}
else if(ac_str == '1') {
$('#usernamemsg').html('<?php echo L("登陆账号已存在，请重新填写！");?>');
$('#username').focus();
return false;
}
else {
$('#usernamemsg').html('<?php echo L("程序可能出现异常，请联系管理员。");?>');
return false;
}
}
}
if(trim(realname) == '') {
$('#realnamemsg').html('<?php echo L("请输入姓名！");?>');
$('#realname').focus();
return false;
}
if(pwd == '') {
$('#pwdmsg').html('<?php echo L("请输入管理员登陆密码！");?>');
$('#pwd').focus();
return false;
}
if(newpwd == '') {
$('#newpwdmsg').html('<?php echo L("请输入管理员登陆确认密码！");?>');
$('#newpwd').focus();
return false;
}
if(pwd != '' || newpwd != '') {
if(pwd != newpwd) {
$('#newpwdmsg').html('<?php echo L("两次密码输入不一致，请重新填写！");?>');
$('#newpwd').focus();
return false;
}
}
$('#submit1').attr('disabled','disabled');
}
</script>
<!-- 脚本js控制 end -->

</div>
</body>
</html>