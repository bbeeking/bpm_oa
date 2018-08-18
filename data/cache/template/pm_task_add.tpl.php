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
            
    </head>
    <body>
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
                                    <a href="#">PMIS</a>
                                </li>
                                <li>
                                    <a href="#">任务管理TMS</a>
                                </li>
                                <li>
添加任务
</li>
                            </ul>
                        </div>
                    </nav>
                    
                    <form action="" enctype="multipart/form-data" method="post" class="form-horizontal">
                    
                    <div class="row-fluid">
<div class="span12">
<h3 class="heading">添加新任务</h3>
<div class="row-fluid">

<fieldset>
<div class="control-group formSep">
<label for="gid" class="control-label"><span class="f_req">*</span>跟踪</label>
<div class="controls">
<?php echo get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type');?>
</div>
</div>

<div class="control-group formSep">
<label for="title" class="control-label"><span class="f_req">*</span>主题</label>
<div class="controls">
<input type="text" id="title" name="title" size="80" />
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>项目</label>
<div class="controls">
<!--												<?php echo get_section('status',$jobStatus,$status,$ary_first=array(''),'status');?>-->
<?php echo get_section('pid',$projectAry,$pid,$ary_first=array(''),'pid','','',$etc='data-placeholder="请选择归属项目..."');?>
</div>
</div>
<div class="control-group formSep">
<label for="status" class="control-label"><span class="f_req">*</span>状态</label>
<div class="controls">
<!--												<?php echo get_section('status',$jobStatus,$status,$ary_first=array(''),'status');?>-->
<?php echo get_section('status',$jobStatus,$status,$ary_first=array(''),'status','','',$etc='data-placeholder="请填写任务状态..."');?>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>优先级</label>
<div class="controls">
<?php echo get_section('priority',$priorityStatusAry,$priority,$ary_first=array(''),'priority','','',$etc='data-placeholder="紧急为优先处理..."');?>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>指派给</label>
<div class="controls">
<?php echo get_section('performer',$userAllowAry,$performer,$ary_first=array(''),'performer');?>
</div>
</div>
<div class="control-group formSep">
<label class="control-label">任务跟踪者：</label>
<div class="controls">
<select name="user_languages" id="user_languages" multiple data-placeholder="选择任务跟踪人..."  >

<!-- 已跟踪用户 -->
<!-- 
<?php if(is_array($userAry)) foreach($userAry AS $key=>$val) { ?>
<option value="<?php echo $key;?>" selected="selected"><?php echo $val;?></option>

<?php } ?>

-->

<!-- 未参与项目的跟踪用户 -->
<?php if(is_array($userAllowAry)) foreach($userAllowAry AS $key=>$val) { ?>
<option value="<?php echo $key;?>"><?php echo $val;?></option>

<?php } ?>

</select>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label">目标版本</label>
<div class="controls">
<?php echo get_section('version',$versionAry,$version,'','version');?>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>开始日期</label>
<div class="controls">
<input type="text" class="" id="dp1" name="startDate" value="<?php echo $startDate;?>" data-date-format="yyyy-mm-dd" />
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>计划完成日期</label>
<div class="controls">
<input type="text" class="" id="dp2" name="endDate" value="<?php echo $endDate;?>" data-date-format="yyyy-mm-dd" />
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>预期时间</label>
<div class="controls">
<input id="estimatedHours" name="estimatedHours" size="3" type="text"> 小时
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>% 完成</label>
<div class="controls">
<?php echo get_section('progress',$doneRatioAry,$progress,'0','progress');?>
</div>
</div>
<div class="control-group formSep">
<label for="username" class="control-label"><span class="f_req">*</span>描述</label>
<div class="controls">
<div class="jstEditor">
    		<textarea cols="60" rows="10" style="height:150px;width:80%;" name="myEditor" id="myEditor"><?php echo $content;?></textarea>
    </div>
    <div class="jstHandle"></div>
</div>
</div>

<div class="control-group">
<div class="controls">
<input type="hidden" id="options_value" name="options_value" value="<?php echo $options_value;?>" />
<button class="btn btn-gebo" type="submit" name="submit" id="submit">添加并继续交</button>
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

<!-- autosize textareas -->
<script src="../templates/js/forms/jquery.autosize.min.js"></script>
<!-- 下拉框选项 -->
<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
<!-- user profile functions -->
<script src="../templates/js/gebo_user_profile.js"></script>

<script src="../templates/js/pms_forms.js"></script>

<!-- enhanced select (chosen) -->
            <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script language="javascript">
//激活ueditor
window.UEDITOR_HOME_URL = "/pms/admin/js/";
var editor = new UE.ui.Editor();
editor.render("myEditor");

$(function(){
//注册修改事件
    $('#user_languages').change(function() {
    	set_options_values();
    });
});

//设置跟踪用户选项值
function set_options_values(){
var options_str = '';
$("#user_languages option:selected").each(function () {
    var $option = $(this);
    var html = $option.html();
    var value = $option.val();
//					    alert('显示的是' + html + '\n值是' + value);
    options_str = options_str+','+value;
});
options_str = options_str.replace(/(^\,*)/g,"");
$('#options_value').val(options_str);
//					alert(options_str);
}

</script>

</div>
</body>
</html>