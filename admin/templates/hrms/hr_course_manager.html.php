<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
			<h3>{L("课程信息列表")}</h3>
			<form action="" method="get">
			<table>
			  	<tr>	
				 	<td>
					 	{L("课程代号：")}<input type="text" id="cid" name="cid" value="{$cid}" />&nbsp;
					  	{L("课程名称：")}<input type="text" id="course_name" name="course_name" value="{$course_name}" />&nbsp;
					  	{L("教师：")}{get_section('teacher',$userAry,$teacher,$ary_first=array(0=>'请选择'),'teacher')}&nbsp;
					  	{L("科目：")}{get_section('subject_type',$DefineSubjectType,$subject_type,$ary_first=array(''),'subject_type')}&nbsp;
					  	{L("年级：")}{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(0=>'请选择'),'grade')}&nbsp;
					  	{L("学员：")}<input type="text" id="student" name="student" value="{$student}" />&nbsp;
					  	<input type="submit" name="submit" value="{L("查询")}" />&nbsp;&nbsp;
					 </td>
				</tr>
			</table>
			</form>
			
			<h3></h3>
		  
			<div class="autoscroll">
				<table class="list issues">
					<thead>
						<tr>
							<th><a href="">{L("cid")}</a></th>
							<th><a href="">{L("课程代号")}</a></th>
							<th><a href="">{L("课程名称")}</a></th>
							<th><a href="">{L("任课老师")}</a></th>
							<th><a href="">{L("学生")}</a></th>
							<th><a href="">{L("科目")}</a></th>
							<th><a href="">{L("年级")}</a></th>
							<th><a href="">{L("学期")}</a></th>
							<th><a href="">{L("状态")}</a></th>
							<th><a href="">{L("操作")}</a></th>
						</tr>
					</thead>
					
					<tbody>
					<?php $i=0;?>
					{loop $dataAry $data}
						{if $i%2 == 0}
						<tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
						{else}
						<tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me" style="background:#FFFFFF;">
						{/if}
							<td>{$data['id']}</td>
							<td><a href="hr_course_view.php?cid={$data['cid']}">{$data['cid']}</a></td>
							<td><a href="hr_course_view.php?cid={$data['cid']}">{$data['course_name']}</a></td>
							<td>{$userAry[$data['teacher_account']]}</td>
							<td>{$data['sid']}</td>
							<td>{$DefineSubjectType[$data['subject_type']]}</td>
							<td>{$DefineGradeAry[$data['grade']]}</td>
							<td>{$DefineTermType[$data['term']]}</td>
							<td>{$DefineCourseStatusAry[$data['status']]}</td>
							<td><a href="hr_course_view.php?cid={$data['cid']}">{L("更新")}</a></td>
						</tr>
						<?php $i++;?>
					{/loop}
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
</div>


</div>
</div>
</body>
</html>