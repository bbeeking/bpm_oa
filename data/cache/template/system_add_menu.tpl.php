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
<li>菜单配置</li>
</ul>
</div>
</nav>
                    
                    <form action="menu_post.php?<?php if($id>0) { ?>type=edit<?php } else { ?>type=add<?php } ?>" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return chksubmit();">
                    
                    <div class="row-fluid">
<div class="span12">
<h3 class="heading"><?php if($id>0) { ?><?php echo L("修改菜单");?><?php } else { ?><?php echo L("添加菜单");?><?php } ?></h3>
<div class="row-fluid">

<fieldset>
<div class="control-group formSep">
<label for="parentid" class="control-label"><span class="f_req">*</span>所属分类</label>
<div class="controls">
<?php echo get_section('parentid',$dataAry,$menuinfo['m_parentid'],$ary_first=array(0=>L("请选择")));?>
<span class="help-block"><?php echo L("添加一级分类无需选择");?></span>
</div>
</div>
<div class="control-group formSep">
<label for="menuname" class="control-label"><span class="f_req">*</span>菜单名称</label>
<div class="controls">
<!-- 20171227 增加自定义菜单功能 $menuinfo $result有且仅有一个值 -->
<input type="text" maxlength="60" name="menuname" id="menuname" value="<?php echo $menuinfo['m_name'];?><?php echo $result['name'];?>" onblur="if(this.value!=''){$('#menunamemsg').html('');}" />
<span class="help-block" id="menunamemsg" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="menulink" class="control-label"><span class="f_req">*</span>链接地址</label>
<div class="controls">
<!-- 20171227 增加自定义菜单功能 $menuinfo $result有且仅有一个值 -->
<input type="text" name="menulink" id="menulink" maxlength="100" value="<?php echo $menuinfo['m_url'];?> <?php echo $result["uri"];?>" <?php echo $block;?> onblur="if(this.value!=''){$('#menulinkmsg').html('');}" />
<span class="help-block" id="menulinkmsg" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="moduleSign" class="control-label"><span class="f_req">*</span>模块标识</label>
<div class="controls">
<!-- 20171227 增加自定义菜单功能 $menuinfo $result有且仅有一个值 -->
<input type="text" name="moduleSign" id="moduleSign" maxlength="100" value="<?php echo $menuinfo['module_sign'];?><?php echo $result['sign'];?>" <?php echo $block;?> onblur="if(this.value!=''){$('#modulesignmsg').html('');}" /> <span style="color:green;"><?php echo L("模块标识要跟脚本文件名一致");?></span>
<span class="help-block" id="modulesignmsg" style="color:#ff0000;"></span>
</div>
</div>

<div class="control-group formSep">
<label for="moduleSign" class="control-label">Icon glyphs图标</label>
<div class="controls">
<!-- 20171227 增加自定义菜单功能 $menuinfo $result有且仅有一个值 -->
<input type="text" name="icon" id="icon" maxlength="100" value="<?php echo $menuinfo['icon'];?>"  /> <a href="http://getbootstrap.com/2.3.2/base-css.html#icons">图标配置参考</a>
</div>
</div>

<div class="control-group formSep">
<label for="locality" class="control-label"><span class="f_req">*</span>显示位置</label>
<div class="controls">
<input type="text" maxlength="3" name="locality" id="locality" value="<?php echo $menuinfo['m_locality'];?>" onblur="if(this.value!=''){$('#localitymsg').html('');}" />
<span class="help-block" id="localitymsg" style="color:#ff0000;"></span>
</div>
</div>
<div class="control-group formSep">
<label for="isview" class="control-label"><span class="f_req">*</span>是否显示</label>
<div class="controls">
<input type="radio" name="isview" id="isview" value="1" <?php if(($menuinfo['m_isview'] != '0' && $menuinfo['m_isview'] != '2')) { ?>checked<?php } ?> /><?php echo L("是");?> &nbsp;&nbsp;
<input type="radio" name="isview" id="isview" value="0" <?php if($menuinfo['m_isview'] == '0') { ?>checked<?php } ?> /><?php echo L("否");?> &nbsp;&nbsp;
<input type="radio" name="isview" id="isview" value="2" <?php if($menuinfo['m_isview'] == '2') { ?>checked<?php } ?>/><?php echo L("所有");?>
</div>
</div>
<div class="control-group">
<div class="controls">
<input type="hidden" name="mid" id="mid" value="<?php echo $menuinfo['m_id'];?>" style="display:none;" />
<button class="btn btn-gebo" type="submit" name="submit" id="submit"><?php echo L("提交");?></button>
<input type="button" name="go_url" value="<?php echo L("返回");?>" onclick="window.location.href='menu_list.php';" />
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
var menuname = $('#menuname').val();
var menulink = $('#menulink').val();
var locality = $('#locality').val();
var moduleSign = $('#moduleSign').val();
if(trim(menuname) == '') {
$('#menunamemsg').html('<?php echo L("菜单名不能为空！");?>');
$('#menuname').focus();
return false;
}
else{
//如果是添加则进入检测，如果修改则跳过
<?php if($id<=0) { ?>
$('#menunamemsg').html('<?php echo L("正在检测，请稍后...");?>');
var ac_str = GetRequest('ajax.php?type=menu&menuname='+encodeURI(menuname));
if(ac_str == '2') {
$('#menunamemsg').html('');
}
else if(ac_str == '1') {
$('#menunamemsg').html('<?php echo L("菜单名称已存在，请重新填写！");?>');
$('#menuname').focus();
return false;
}
else {
$('#menunamemsg').html('<?php echo L("程序可能出现异常，请联系管理员。");?>');
return false;
}
<?php } ?>
}

if(trim(menulink) == '') {
$('#menulinkmsg').html('<?php echo L("链接地址不能为空！");?>');
$('#menulink').focus();
return false;
}
if(trim(moduleSign) == '') {
$('#modulesignmsg').html('<?php echo L("模块标识不能为空！");?>');
$('#moduleSign').focus();
return false;
}
if(trim(locality) != '') {
if(isNaN(locality)) {
$('#localitymsg').html('<?php echo L("显示位置只能填写数字！");?>');
$('#locality').focus();
return false;
}
}
$('#Submit').attr("disabled","disabled");
}
</script>
<!-- 脚本js控制 end -->

</div>
</body>
</html>