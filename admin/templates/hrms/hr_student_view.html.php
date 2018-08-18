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
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<!--<div class="" id="main">-->
<div class="nosidebar" id="main">
    <div id="content">
        
		<h2>学员信息详情 #{$result['sid']} 
			<a href="#show" name="hide" onclick="update_student_info();">[更新]</a> 
			<a onclick="del_student_info('{$result['name']}','{$result['sid']}');">[删除]</a>
		</h2>
		<div class="issue status-4 priority-4 overdue created-by-me assigned-to-me details">
		    <div class="next-prev-links contextual">
		      « 上一页 |<span class="position">1/35</span> |<a href="" title="#10642">下一页 »</a>
		    </div>
		  
			<div class="subject">
			<div><h3>{$result['name']}</h3></div>
			</div>
		        <p class="author">
		        	由<a href="javascript:;">{$userAry[$result['builder']]}</a> 
		        	在 <a href="javascript:;" title="{$result['create_date']}">{$result['create_date']}</a> 登记入学.
		        	最后更新日期： <a href="javascript:;" title="{$result['last_operation_time']}">{$result['last_operation_time']}</a>
		        </p>
		
				<table class="attributes">
					<tbody>
					<tr>
					    <th>出生日期:</th><td>{$result['birth']}</td>
					    <th>性别:</th><td>{$sexAry[$result['sex']]}</td>
					</tr>
					<tr>
						<th>在读学校:</th><td>{$result['school']}</td>
					    <th>当前年级:</th><td>{$DefineGradeAry[$result['grade']]}</td>
					</tr>
					<tr>
						<th>联系家长:</th><td>{$result['parent']}</td>
						<th>家长电话:</th><td>{$result['tel']}</td>
					</tr>
					<tr>
					    <th>联系电话:</th><td>{$result['phone']}</td>
					    <th>QQ:</th><td>{$result['qq']}</td>
					</tr>
					<tr>
					     <th>入学日期:</th><td>{$result['enrollment_date']}</td>
					</tr>
					<tr>
					    <th>报读渠道:</th><td>{$channelAry[$result['channel']]}</td>
					    <th>在读:</th><td>{$statusAry[$result['status']]}</td>
					</tr>
					<tr>
						<th>家庭住址</th><td>{$result['addr']}</td>
					</tr>
					</tbody>
				</table>
				
				<hr />
		  		<p><strong>备注：</strong></p>
				<div>
					<p>{$result['detail']}</p>
				</div>
				
				<hr />
		  		<p><strong>报读课程记录</strong><a onclick="update_student_info();">[添加课程]</a></p>
				<div>
					{loop $courseRecordDataAry $data}
					<p>
			        	在 <a href="javascript:;" title="{$data['enrollment_date']}">{$data['enrollment_date']}</a> 
			        	报读课程  <a href="javascript:;" title="{$EnumCourseAry[$data['course']]}">{$EnumCourseAry[$data['course']]}</a>&nbsp;&nbsp;&nbsp;
			        	由教员 <a href="javascript:;">{$userAry[$data['tid']]}</a> 教学&nbsp;&nbsp;&nbsp;
			        	课程剩余课时<a href="javascript:;">{$data['last_time']}</a>&nbsp;&nbsp;&nbsp;
			        	课程当前<a href="javascript:;"><font color="red">进行中</font></a>&nbsp;&nbsp;&nbsp;
			        	<a href="javascript:;">查看详细课程记录</a>&nbsp;&nbsp;&nbsp;
			        	<a href="javascript:;">课程大纲</a>&nbsp;&nbsp;&nbsp;
		        	</p>
		        	{/loop}
		        	
				</div>
				
				<!-- 
				<hr />
				<p><strong>试题测试成绩</strong><a onclick="update_student_info();">[添加试题测试记录]</a></p>
				<div>
					<p>
			        	于 <a href="javascript:;" title="{$result['create_date']}">1111-11-11</a> 
			        	测试编号为 <a href="javascript:;">《晨曦2013-12-12初二英语中级3》</a>试卷&nbsp;&nbsp;&nbsp;
			        	试题得分 90 &nbsp;&nbsp;&nbsp;
			        	<a href="javascript:;">查看得分记录</a>&nbsp;&nbsp;&nbsp;
			        	<a href="javascript:;">学员APPRAISAL REPORT</a>&nbsp;&nbsp;&nbsp;
		        	</p>
				</div>
				
				<hr />
		  		<p><strong>教师评价</strong><a onclick="check_evaluate();">[查看评价]</a><a onclick="add_evaluate();">[添加评价和寄语]</a></p>
				<div>
					<p>
						该部分内容隐藏需要点击方展开
			        	该学生课堂活泼，但缺乏学习的方法好，和规划
		        	</p>
				</div>
				
				<hr />
		  		<p><strong>电话访谈记录</strong><a onclick="update_student_info();">[添加访谈记录]</a></p>
				<div>
					<p>
			        	于 <a href="javascript:;" title="{$result['create_date']}">1111-11-11</a> 
			        	由教员 <a href="javascript:;">彭诗敏</a>进行电话家访&nbsp;&nbsp;&nbsp;
			        	<a href="javascript:;">查看详细访谈记录</a>&nbsp;&nbsp;&nbsp;
		        	</p>
				</div>
				 -->
		</div>
		
		
		<div style="clear: both;"></div>
		  <div id="update" style="display:none;">
		  <h3>更新学员信息<a href="#hide" name="show" onclick="hidden_update();">[隐藏]</a></h3>
		  <form action="hr_student_update.php" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="get">
		    <div class="box">
		        <fieldset class="tabular"><legend>修改属性</legend>
		        <div id="all_attributes">
					
					
					<!-- 左侧表单 -->
		        	<div class="splitcontentleft">
			        	<p>
			        		<label for="name">姓名<span class="required"> *</span></label>
			        		<input type="text" id="name" name="name" value="{$result['name']}" size="20" />
			        	</p>
			        	<p>
							<label for="birth">出生日期<span class="required"> *</span></label>
							<input type="text" id="birth" name="birth" value="{$result['birth']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
						</p>
						<p>
			        		<label for="school">在读学校<span class="required"> *</span></label>
			        		<input type="text" id="school" name="school" value="{$result['school']}" size="20" />
			        	</p>
			        	<p>
			        		<label for="parent">联系家长<span class="required"> *</span></label>
			        		<input type="text" id="parent" name="parent" value="{$result['parent']}" size="20" />
			        	</p>
			        	<p>
			        		<label for="qq">QQ号码</label>
			        		<input type="text" id="qq" name="qq" value="{$result['qq']}" size="20" />
			        	</p>
			        	<p>
							<label for="enrollment_date">入学日期<span class="required"> *</span></label>
							<input type="text" id="enrollment_date" name="enrollment_date" value="{$result['enrollment_date']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
						</p>
						<p>
							<label for="course">报读课程<span class="required"> *</span></label>
							{get_section('course',$EnumCourseAry,$result['course'],$ary_first=array(0=>'请选择'),'course','','width:152px;')}
						</p>
		        		<p>
			        		<label for="addr">家庭住址<span class="required"> *</span></label>
			        		<input type="text" id="addr" name="addr" value="{$result['addr']}" size="35" />
			        	</p>
		        	</div>
		        	
		        	
		        	<!-- 右侧表单 -->
		        	<div class="splitcontentright">
		        		<p>
							<label for="sex">性别<span class="required"> *</span></label>
							{get_section('sex',$sexAry,$result['sex'],$ary_first=array(0=>'请选择'),'sex','','width:152px;')}
						</p>
						<!-- 轮空 -->
						<p></p>
						<p>
							<label for="grade">当前年级<span class="required"> *</span></label>
							{get_section('grade',$DefineGradeAry,$result['grade'],$ary_first=array(0=>'请选择'),'grade','','width:152px;')}
						</p>
						<p>
			        		<label for="tel">联系电话<span class="required"> *</span></label>
			        		<input type="text" id="tel" name="tel" value="{$result['tel']}" size="20" />
			        	</p>
		        		<p>
			        		<label for="phone">学生手机</label>
			        		<input type="text" id="phone" name="phone" value="{$result['phone']}" size="20" />
			        	</p>
						<p>
							<label for="channel">报读渠道</label>
							{get_section('channel',$channelAry,$result['channel'],$ary_first=array(0=>'请选择'),'channel','','width:152px;')}
						</p>
						<p>
							<label for="entry_level">入学成绩<span class="required"> *</span></label>
							<input type="text" id="entry_level" name="entry_level" value="{$result['entry_level']}" size="20" />
						</p>
						<p>
							<label for="status">在读<span class="required"> *</span></label>
							{get_section('status',$statusAry,$result['status'],$ary_first=array(0=>'请选择'),'status','','width:152px;')}
						</p>
		        	</div>
						
					<p>
					  <label>备注信息</label>
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
				    		<textarea cols="60" rows="10" style="height:150px;" name="myEditor" id="myEditor">{$result['detail']}</textarea>
					    </div>
					    <div class="jstHandle"></div>
					  </span>
					</p>


		        </div>
		        </fieldset>

		    </div>
		    <input type="hidden" id="sid" name="sid" value="{$result['sid']}"/>
		    <input name="commit" value="提交" type="submit" />
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

//更新学员信息
function update_student_info()
{
	document.getElementById("update").style.display = "block";
}

//删除学员信息
function del_student_info(name,sid)
{
	cs = '{L('是否删除学员：')} '+name+' ?';
	if(confirm(cs)) 
	window.location = 'hr_student_del.php?sid='+sid;
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
</script>

</body>
</html>
