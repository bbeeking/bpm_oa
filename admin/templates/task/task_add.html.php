<!-- 为兼容ueditor 增加模板头部增加输出空行 -->
<?php echo "&nbsp;";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script language="javascript">
	//激活ueditor
	window.UEDITOR_HOME_URL = "/pms/admin/js/";
	var editor = new UE.ui.Editor();
	editor.render("myEditor");
	
	function CheckDate()
	{
		return true;
	}
</script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		<div style="clear: both;"></div>
		  <div id="update" style="">
		  <h3>添加新任务</h3>
		  <form action="" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="post">
		    <div class="box">
		        <fieldset class="tabular"><legend>修改属性</legend>
		        <div id="all_attributes">
					<p>
						<label for="issue_tracker_id">跟踪<span class="required"> *</span></label>
						{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
					</p>
					<p>
						<label for="title">主题<span class="required"> *</span></label>
						<input type="text" id="title" name="title" size="80" />
					</p>
			
					<p>
					  <label>描述<span class="required"> *</span></label>
					  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
					    		<textarea cols="60" rows="10" style="height:300px;" name="myEditor" id="myEditor">{$content}</textarea>
					    </div>
					    <div class="jstHandle"></div>
					  </span>
					</p>
			
			
					<div id="attributes" class="attributes">
						<div class="splitcontent">
						<div class="splitcontentleft">
							<p>
								<label for="status">状态<span class="required"> *</span></label>
								{get_section('status',$jobStatus,$status,$ary_first=array(''),'status')}
							</p>
						
							<p>
								<label for="priority">优先级<span class="required"> *</span></label>
								{get_section('priority',$priorityStatusAry,$priority,$ary_first=array(''),'priority')}
							</p>
						
							<p>
								<label for="performer">指派给</label>
								{get_section('performer',$userAry,$performer,$ary_first=array(''),'performer')}
							</p>
						
							<p>
							<label for="version">目标版本</label>
							{get_section('version',$versionAry,$version,'','version')}
							<a href="#" ><img alt="Add" src="../images/add.png" /></a>
							</p>
						</div>
					
						<div class="splitcontentright">
						
						<p>
							<label for="startDate">开始日期</label>
							<input type="text" id="startDate" name="startDate" value="{$startDate}" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate">
						</p>
						<p>
							<label for="endDate">计划完成日期</label>
							<input type="text" id="endDate" name="endDate" value="{$endDate}" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate">
						</p>
						<p>
							<label for="estimatedHours">预期时间</label>
							<input id="estimatedHours" name="estimatedHours" size="3" type="text"> 小时
						</p>
					
						<p>
						<label for="progress">% 完成</label>
							{get_section('progress',$doneRatioAry,$progress,'0','progress')}
						</p>
					
						</div>
						</div>
					</div>
		        </div>
		        </fieldset>
		    </div>
		    <input id="submit" name="submit" value="提交" type="submit" />
		</form>
		</div>
    </div>
</div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by mlight <a href="">MLight</a> © 2013-2015 YueFeng Leung
  </div></div>
</div>
</div>
</div>

</body>
</html>

