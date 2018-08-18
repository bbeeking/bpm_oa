<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<link href="../css/application.css" rel="stylesheet" type="text/css" />
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
			<h3>{L("学员课程登记日志")}</h3>
			<form action="" method="get">
			<table>
			  	<tr>	
				 	<td>
				 		{if check_user_group($_SESSION['UserName'], '1')}
						 	{L("课程代号：")}<input type="text" id="cid" name="cid" value="{$cid}" />&nbsp;
						  	{L("课程名称：")}<input type="text" id="course_name" name="course_name" value="{$course_name}" />&nbsp;
						  	{L("流水号：")}<input type="text" id="sign_key" name="sign_key" value="{$sign_key}" />&nbsp;
						{/if}
					  	{L("学生：")}<input type="text" id="student" name="student" value="{$student}" />&nbsp;
					  	{L("开始日期：")}<input type="text" id="startDate" name="startDate" value="{$startDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
					  	{L("结束日期：")}<input type="text" id="endDate" name="endDate" value="{$endDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
					  	<input type="submit" name="submit" value="{L("查询")}" />&nbsp;&nbsp;
					 </td>
				</tr>
			</table>
			</form>
			
			<span><b>查询时间段内的已审批的总课时：<font style="font-size:23px;color:green;">{$totalDuration}</font>分钟，</b></span>
			<span><b>折算合计：<font style="font-size:23px;color:blue;">{$totalDurationConvert}</font>小时</b></span>
			
			<h3></h3>
		  
			<div class="autoscroll">
				<table class="list issues">
					<thead>
						<tr>
							<th><a href="">{L("id")}</a></th>
							<th><a href="">{L("流水号")}</a></th>
							<th><a href="">{L("cid")}</a></th>
							<th><a href="">{L("课程名称")}</a></th>
							<th><a href="">{L("学员")}</a></th>
							
							<th><a href="">{L("出勤")}</a></th>
							<th><a href="">{L("课程日期")}</a></th>
							
							<th><a href="">{L("星期")}</a></th>
							
							<th><a href="">{L("课程开始")}</a></th>
							<th><a href="">{L("课程结束")}</a></th>
							<th><a href="">{L("时间/分钟")}</a></th>
							<th><a href="">{L("创建日期")}</a></th>
							
							<th><a href="">{L("审批状态")}</a></th>
							
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
							<td>{$data['sign_key']}</td>
							<td>{$data['cid']}</td>
							<td>{$courseInfoAry[$data['cid']]}</td>
							<td>
								{$studentInfoAry[$data['sid']]}
							</td>
							<td>
								{if $data['absence']=='1'}
								<font style="color:#ffffff;font-weight:bold;background:red;">
									{$DefineCourseAbsenceStatusAry[$data['absence']]}
								</font>
								{else}
<!--								<font style="color:#ffffff;font-weight:bold;background:#51A101;">-->
			        				{$DefineCourseAbsenceStatusAry[$data['absence']]}
<!--		        				</font>-->
			        			{/if}
							</td>
							<td>{$data['course_date']}</td>
							
							<?php $week_num = date('w',strtotime($data['course_date']));?>
							<td>星期<font {if ($week_num == '0' or $week_num == '6')}style="color:red;"{/if}>{$weekAry[$week_num]}</font></td>
							
							<td>{$data['startTime']}</td>
							<td>{$data['endTime']}</td>
							<td>
								{if $data['duration']<60}
								<font style="color:#ffffff;font-weight:bold;background:red;">
									{$data['duration']}
								</font>
								{else}
<!--								<font style="color:#ffffff;font-weight:bold;background:#51A101;">-->
			        				{$data['duration']}
<!--		        				</font>-->
			        			{/if}
							</td>
							<td>{date('Y-m-d',$data['create_time'])}</td>
							
							<td>
								<font style="color:#ffffff;font-weight:bold;background:{$statusBgColor[$data['application_status']]};">
								{$appStateAry[$data['application_status']]}
								</font>
							</td>
							
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