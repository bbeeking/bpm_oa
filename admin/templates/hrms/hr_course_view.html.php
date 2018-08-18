<!-- 为兼容ueditor 增加模板头部增加输出空行 -->
<?php echo "&nbsp;";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<!--<div class="" id="main">-->
<div class="nosidebar" id="main">
    <div id="content">
        
		<h2>课程信息详情 #{$result['cid']} 
			<a href="#show" name="hide" onclick="update_course_info();">[更新]</a> 
			<a onclick="del_course_info('{$result['course_name']}','{$result['cid']}');">[删除]</a>
		</h2>
		<div class="issue status-4 priority-4 overdue created-by-me assigned-to-me details">
		    <div class="next-prev-links contextual">
		      « 上一页 |<span class="position">1/35</span> |<a>下一页 »</a>
		    </div>
		  
			<div class="subject">
			<div><h3>{$result['course_name']}</h3></div>
			</div>
		        <p class="author">
		        	由<a href="javascript:;">{$userAry[$result['last_editor']]}</a> 
		        	在 <a href="javascript:;" title="{$result['create_time']}">{$result['create_time']}</a> 添加课程.
		        	最后更新日期： <a href="javascript:;" title="{$result['last_update_time']}">{$result['last_update_time']}</a>
		        </p>
		
				<table class="attributes">
					<tbody>
					<tr>
					    <th>课程代号:</th><td>{$result['cid']}</td>
					    <th>课程名称:</th><td>{$result['course_name']}</td>
					</tr>
					<tr>
						<th>任课教师:</th><td>{$userAry[$result['teacher_account']]}</td>
					    <th>年级:</th><td>{$DefineGradeAry[$result['grade']]}</td>
					</tr>
					<tr>
						<th>科目:</th><td>{$DefineSubjectType[$result['subject_type']]}</td>
						<th>学期:</th><td>{$DefineTermType[$result['term']]}</td>
					</tr>
					<tr>
					    <th>课程开始日期:</th><td>{$result['start_date']}</td>
					    <th>课程关闭日期:</th><td>{$result['end_date']}</td>
					</tr>
					<tr>
					     <th>当前状态:</th><td>{$DefineCourseStatusAry[$result['status']]}</td>
					</tr>
					</tbody>
				</table>
				
				<hr />
		  		<p><strong>课程时间表</strong></p>
				
				<hr />
		  		<p><strong>课程报读学员表</strong></p>
				<div>
					<table >
						<tbody>
						<tr>
							{loop $courseStudentAry $sid}
								<td>
									<a href="hr_student_view.php?sid={$sid}">
										<font style="color:#ffffff;font-weight:bold;background:#51A101;">
											{$studentInfoNoLimitAry[$sid]}
										</font>
									</a>
								</td>
							{/loop}
							{loop $overStudentAry $sid}
								<td>
									<a href="hr_student_view.php?sid={$sid}">
										<font style="color:#ffffff;font-weight:bold;background:#D95762;">
											{$studentInfoNoLimitAry[$sid]}
										</font>
									</a>
								</td>
							{/loop}
						</tr>
						</tbody>
					</table>
				</div>
				
				<hr />
		  		<p><strong>教师本月签到记录</strong><a>[查看历史签到日志]</a></p>
				<div>
					<p>
						{loop $courseTeacherRecordAry $data}
						<font style="color:green;">{$data['course_date']}</font> &nbsp;&nbsp;
						<?php $week_num = date('w',strtotime($data['course_date']));?>
						<span style="font-weight:bold;">星期<font {if ($week_num == '0' or $week_num == '6')}style="color:red;"{/if}>{$weekAry[$week_num]}</font></span> &nbsp;
						<font style="color:green;">{$data['startTime']}</font> 至 <font style="color:green;">{$data['endTime']}</font> 
						由 <font style="color:#2A5685;">{$userAry[$data['teacher']]}</font> 老师签到</br>
						{/loop}
					</p>
				</div>
				
				<hr />
		  		<p><strong>学员本月考勤记录</strong><a>[查看历史考勤日志]</a></p>
				<div>
					<!--
					<p>
						<font style="color:green;">2014-06-19</font> &nbsp;&nbsp;<span style="font-weight:bold;">周<font>一</font></span> &nbsp;
						<font style="color:green;">08:00</font> 至 <font style="color:green;">10:00</font> 
						学员<font style="color:#2A5685;">何家儒</font> 
						由 <font style="color:#2A5685;">何家儒</font> 老师签到</br>
					</p>
					-->
				</div>
				
				<hr />
		  		<p><strong>备注：</strong></p>
				<div>
					<p>{$result['detail']}</p>
				</div>
				
		</div>
		
		
		<div style="clear: both;"></div>
		  <div id="update" style="display:none;">
		  <h3>更新课程信息<a href="#hide" name="show" onclick="hidden_update();">[隐藏]</a></h3>
		  <form action="hr_course_record.php" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="post">
			<div id="paper_attribute" class="box" >
		        <fieldset class="tabular"><legend>课程属性</legend>
		        <div id="all_attributes">
					<div id="attributes" class="attributes">
						<div class="splitcontent">
							<div class="splitcontentleft">
								<p>
									<label>课程代号<span class="required"> *</span></label>
									<input type="text" id="cid" name="cid" size="8" value="{$cid}" style="width:152px;" readonly="readonly" /></br>
									<span style="color:red;">(课程代号不允许修改)</span>
								</p>
								<p>
									<label>任课教师<span class="required"> *</span></label>
									{get_section('teacher_account',$userAry,$result['teacher_account'],$ary_first=array(''),'teacher_account','','width:152px;')}
								</p>
								<p>
									<label>学期<span class="required"> *</span></label>
									{get_section('term',$DefineTermType,$result['term'],$ary_first=array(''),'term','','width:152px;')}
								</p>
								<p>
									<label>课程开始日期<span class="required"> *</span></label>
									<input type="text" id="startDate" name="startDate" value="{$result['start_date']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
								</p>
								<p>
									<label>当前状态<span class="required"> *</span></label>
									{get_section('status',$DefineCourseStatusAry,$result['status'],$ary_first=array(''),'status','','width:152px;')}
								</p>
							</div>
							
							<div class="splitcontentright">
								<p>
									<label>课程名称<span class="required"> *</span></label>
									<input type="text" id="course_name" name="course_name" size="64" value="{$result['course_name']}" style="width:152px;" />
								</p>
								<p></p>
								<p>
									<label>年级<span class="required"> *</span></label>
									{get_section('grade',$DefineGradeAry,$result['grade'],$ary_first=array(''),'grade','','width:152px;')}
								</p>
								<p>
									<label>科目类型<span class="required"> *</span></label>
									{get_section('subject_type',$DefineSubjectType,$result['subject_type'],$ary_first=array(''),'subject_type','','width:152px;')}
								</p>
								<p>
									<label>课程关闭日期</label>
									<input type="text" id="endDate" name="endDate" value="{$result['end_date']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
								</p>
							</div>
							
						</div>
					</div>
					
					<div style="margin-left:180px;">
						<div>
							<label>全部学员</label>
							{get_section('select1',$onReadyStudentAry,'',$ary_first=array(''),'select1','','width:150px;height:200px;float:left;padding:4px;',' multiple="multiple"')}
						</div>
						<div style="float:left">
							<span id="add">
								<input type="button" class="btn" value="&gt;"/>
							</span><br />
							<span id="add_all">
								<input type="button" class="btn" value="&gt;&gt;"/>
							</span><br />
							<span id="remove">
								<input type="button" class="btn" value="&lt;"/>
							</span><br />
							<span id="remove_all">
								<input type="button" class="btn" value="&lt;&lt;"/>
							</span>
						</div>
						<div>
<!--							<select multiple="multiple" id="select2" name="select2" style="width:150px;height:200px;float:left;padding:4px;"></select>-->
							{get_section('select2',$courseStudentNameAry,'',$ary_first=array(''),'select2','','width:150px;height:200px;float:left;padding:4px;',' multiple="multiple"')}
						</div>
					</div>
			
					<p>
					  <label>课程信息备注</label>
					  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
					    		<textarea cols="40" rows="10" style="height:100px;" name="myEditor" id="myEditor">{$result['detail']}</textarea>
					    </div>
					    <div class="jstHandle"></div>
					  </span>
					</p>
					
					<input type="hidden" id="oper_sign" name="oper_sign" value="update" />
					<input type="hidden" id="cid" name="cid" value="{$result['cid']}" />
					<input type="hidden" id="options_value" name="options_value" value="{$options_value}" />
					<input type="submit" name="submit" value="提交课程信息" />
		        </div>
		        </fieldset>
		    </div>
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

<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script language="javascript">
//激活ueditor
window.UEDITOR_HOME_URL = "/pms/admin/js/";
var editor = new UE.ui.Editor();
editor.render("myEditor");

//更新课程信息
function update_course_info()
{
	document.getElementById("update").style.display = "block";
}

//隐藏更新
function hidden_update()
{
	document.getElementById("update").style.display = "none";
}

//查看用户的工作
function check_user_task(user)
{
	window.location = 'task_manager.php?performer='+user;
//	alert("查看当前"+user+"的工作信息!");
}





	//下拉框交换JQuery
	$(function(){
	    $('#add').click(function() {
	        $('#select1 option:selected').appendTo('#select2');
	        set_options_values();
	    });
	    $('#remove').click(function() {
	        $('#select2 option:selected').appendTo('#select1');
	        set_options_values();
	    });
	    $('#add_all').click(function() {
	        $('#select1 option').appendTo('#select2');
	        set_options_values();
	    });
	    $('#remove_all').click(function() {
	        $('#select2 option').appendTo('#select1');
	        set_options_values();
	    });
	    $('#select1').dblclick(function(){ //绑定双击事件
	        //获取全部的选项,删除并追加给对方
	        $("option:selected",this).appendTo('#select2');
	        set_options_values();
	    });
	    $('#select2').dblclick(function(){
	       $("option:selected",this).appendTo('#select1');
	       set_options_values();
	    });
	});
	
	//设置报读班级的学员选项值
	function set_options_values(){
		var options_str = '';
		$('#select2 option').each(function () {
		    var $option = $(this);
		    var html = $option.html();
		    var value = $option.val();
	//	    alert('显示的是' + html + '\n值是' + value);
		    options_str = options_str+','+value;
		});
		options_str = options_str.replace(/(^\,*)/g,"");
		$('#options_value').val(options_str);
	//	alert(options_str);
	}
</script>

</body>
</html>
