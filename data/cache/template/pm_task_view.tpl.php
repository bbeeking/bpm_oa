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
                    
                    <form action="task_update.php" enctype="multipart/form-data" method="post" class="form-horizontal" >
                    
                    	<div class="row-fluid" id="show" style="display:block;">
<div class="span12">
<h3 class="heading">任务 #<?php echo $result['id'];?> 
<a href="#show" name="hide" onclick="update_task();">[更新]</a>
<a onclick="del_task('<?php echo $result['title'];?>','<?php echo $result['id'];?>');">[删除]</a>
</h3>
<div class="row-fluid">
<div class="span12">
<div class="issue">
<ul>
<li class="v-heading">
<?php echo $result['title'];?>
<span class="help-block">
由<a href="javascript:;"><?php echo $userAry[$result['builder']];?></a> 
        										在 <a href="javascript:;" title="<?php echo $result['create_date'];?>"><?php echo $result['create_date'];?></a> 完成登记.
        									最后更新日期： <a href="javascript:;" title="<?php echo $result['last_operation_time'];?>"><?php echo $result['last_operation_time'];?></a>
        									</span>
</li>
<li class="span5">
<span class="item-key">状态</span>
<div class="issue-item"><?php echo $jobStatus[$result['status']];?>
</div>
</li>
<li class="span5">
<span class="item-key">开始日期</span>
<div class="issue-item"><?php echo $result['start_time'];?></div>
</li>
<li class="span5">
<span class="item-key">优先级</span>
<div class="issue-item"><?php echo $priorityStatusAry[$result['priority']];?></div>
</li>
<li class="span5">
<span class="item-key">计划完成日期</span>
<div class="issue-item"><?php echo $result['end_time'];?></div>
</li>
<li class="span5">
<span class="item-key">指派给</span>
<div class="issue-item">
<a onclick="check_user_task('<?php echo $result['performer'];?>');" <?php if($result['performer'] == $_SESSION['UserName']) { ?>style="color:#ffffff;font-weight:bold;background:#507AAA;"<?php } ?>>
<?php echo $userAry[$result['performer']];?>
</a>
</div>
</li>
<li class="span5">
<span class="item-key">跟踪者</span>
<div class="issue-item"><?php echo userStrToAry($result['follower'],'','',$userAry,$style='color:#ffffff;font-weight:bold;background:#51A101;','');?></div>
</li>
<li class="span5">
<span class="item-key">% 完成</span>
<div class="issue-item sepH_d progress progress-success progress-striped active" style="width:120px;">
<div class="bar" style="width: <?php echo $result['progress'];?>%" title="已完成<?php echo $result['progress'];?>%"></div>
</div>
</li>
<li class="span5">
<span class="item-key">类别</span>
<div class="issue-item"><?php echo $trackerStatusAry[$result['type']];?></div>
</li>
<li class="span5">
<span class="item-key">耗时</span>
<div class="issue-item"><?php if($result['spent_time']>0) { ?><?php echo $result['spent_time'];?> h<?php } else { ?>未登记<?php } ?></div>
</li>
<li class="span5">
<span class="item-key">归属项目</span>
<div class="issue-item"><a href=""><?php echo $projectAllAry[$result['pid']];?></a></div>
</li>
<li class="span5">
<span class="item-key">目标版本</span>
<div class="issue-item"><a href=""><?php echo $result['version'];?>XXXX</a></div>
</li>

<li class="span11">
<span class="item-key">备注信息</span>
<div class="issue-item span9" style="word-wrap:break-word;margin-left:70px;">
<?php echo $result['content'];?>
</div>
</li>
</ul>
</div>
</div>
</div>	
</div>
</div>
                    
                    <div class="row-fluid" id="update" style="display:none;">
<div class="span12">
<h3 class="heading">更新任务 #<?php echo $result['id'];?>信息<a href="#hide" name="show" onclick="hidden_update();">[隐藏]</a></h3>
<div class="row-fluid">
<div class="span6">
<fieldset>
<div class="control-group formSep">
<label class="control-label"><span class="f_req">*</span>跟踪：</label>
<div class="controls text_line">
<?php echo get_section('type',$trackerStatusAry,$type,'1','type');?>
</div>
</div>

<div class="control-group formSep">
<label for="school" class="control-label"><span class="f_req">*</span>状态：</label>
<div class="controls">
<?php echo get_section('status',$jobStatus,$result['status'],$ary_first=array(''),'status');?>
</div>
</div>
<div class="control-group formSep">
<label for="course" class="control-label"><span class="f_req">*</span>优先级：</label>
<div class="controls">
<?php echo get_section('priority',$priorityStatusAry,$result['priority'],$ary_first=array(''),'priority');?>
</div>
</div>
<div class="control-group formSep">
<label for="parent" class="control-label"><span class="f_req">*</span>指派给：</label>
<div class="controls">
<?php echo get_section('performer',$userAry,$result['performer'],$ary_first=array(''),'performer');?>
</div>
</div>
<div class="control-group formSep">
<label for="dp2" class="control-label"><span class="f_req">*</span>归属项目：</label>
<div class="controls">
<?php echo get_section('pid',$projectAry,$result['pid'],'','pid');?>
</div>
</div>
<div class="control-group formSep">
<label for="dp2" class="control-label"><span class="f_req">*</span>目标版本：</label>
<div class="controls">
<?php echo get_section('version',$versionAry,$result['version'],'','version');?>
</div>
</div>
</fieldset>
</div>


<div class="span6">
<fieldset>

<div class="control-group formSep">
<label for="dp1" class="control-label"><span class="f_req">*</span>主题：</label>
<div class="controls">
<input id="title" name="title" size="80" value="<?php echo $result['title'];?>" type="text" />
<!--													<input type="text" class="span8" id="dp1" name="birth" data-date-format="yyyy-mm-dd" value="<?php echo $result['birth'];?>" />-->
</div>
</div>
<div class="control-group formSep">
<label for="addr" class="control-label"><span class="f_req">*</span>开始日期：</label>
<div class="controls">
<input type="text" id="startDate" name="startDate" value="<?php echo $result['start_time'];?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" />
</div>
</div>
<div class="control-group formSep">
<label for="grade" class="control-label"><span class="f_req">*</span>计划完成日期：</label>
<div class="controls">
<!--													<input type="text" id="u_fname" class="input-xlarge" value="<?php echo $DefineGradeAry[$result['grade']];?>" />-->
<input type="text" id="endDate" name="endDate" value="<?php echo $result['end_time'];?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" />
</div>
</div>
<div class="control-group formSep">
<label for="status" class="control-label"><span class="f_req">*</span>预期时间：</label>
<div class="controls">
<input id="estimated_hours" name="estimated_hours" size="3" type="text" value="<?php echo $result['estimated_hours'];?>" /> 小时
</div>
</div>
<div class="control-group formSep">
<label for="entry_level" class="control-label"><span class="f_req">*</span>% 完成：</label>
<div class="controls">
<?php echo get_section('progress',$doneRatioAry,$result['progress'],'0','progress');?>
</div>
</div>

</fieldset>
</div>

<div class="span12">
<fieldset>

<div class="control-group formSep">
<label class="control-label">任务跟踪者：</label>
<div class="controls">
<select name="user_languages" id="user_languages" multiple data-placeholder="选择任务跟踪人..."  >

<!-- 已跟踪用户 -->
<?php if(is_array($followerAry)) foreach($followerAry AS $key=>$val) { ?>
<option value="<?php echo $key;?>" selected="selected"><?php echo $val;?></option>

<?php } ?>


<!-- 可分配跟踪的用户 -->
<?php if(is_array($divisibleUserAry)) foreach($divisibleUserAry AS $key=>$val) { ?>
<option value="<?php echo $key;?>"><?php echo $val;?></option>

<?php } ?>

</select>
</div>
</div>

<div class="control-group formSep">
<label for="myEditor" class="control-label">备注信息：</label>
<div class="controls">
<div class="jstEditor">
    		<textarea cols="60" rows="10" style="height:150px;width:80%;" name="myEditor" id="myEditor"><?php echo $result['content'];?></textarea>
    </div>
    <div class="jstHandle"></div>
</div>
</div>
<div class="control-group">
<div class="controls">

<input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>"/>
<input type="hidden" id="options_value" name="options_value" value="<?php echo $options_value;?>" />
<button class="btn btn-gebo" type="submit">提交</button>

<button class="btn">取消</button>
</div>
</div>
</fieldset>
</div>
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


<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 

<!-- 脚本js控制 start -->
<script language="javascript">

//激活ueditor
window.UEDITOR_HOME_URL = "/pms/admin/js/";
var editor = new UE.ui.Editor();
editor.render("myEditor");

//更新任务
function update_task()
{
document.getElementById("update").style.display = "block";
document.getElementById("show").style.display = "none";
}

//删除任务
function del_task(title,id)
{
cs = '<?php echo L('是否删除任务：');?> 《'+title+'》 ?';
if(confirm(cs)) 
window.location = 'task_del.php?id='+id;
}

//隐藏更新
function hidden_update()
{
document.getElementById("update").style.display = "none";
document.getElementById("show").style.display = "block";
}

//查看用户的工作
function check_user_task(user)
{
window.location = 'task_manager.php?performer='+user;
//				alert("查看当前"+user+"的工作信息!");
}

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
//				    alert('显示的是' + html + '\n值是' + value);
    options_str = options_str+','+value;
});
options_str = options_str.replace(/(^\,*)/g,"");
$('#options_value').val(options_str);
//				alert(options_str);
}

</script>
<!-- 脚本js控制 end -->

</div>
</body>
</html>