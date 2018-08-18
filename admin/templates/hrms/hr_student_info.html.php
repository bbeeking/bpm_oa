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
			<h3>{L("学员信息列表")}</h3>
			<form action="" method="get">
			<table>
			  	<tr>	
				 	<td>
					 	{L("姓名：")}<input type="text" id="name" name="name" value="{$name}" />&nbsp;
					  	{L("性别：")}{get_section('sex',$sexAry,$sex,$ary_first=array(0=>'请选择'),'sex')}&nbsp;
					  	{L("年级：")}{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(0=>'请选择'),'grade')}&nbsp;
					  	{L("在读：")}{get_section('status',$statusAry,$status,$ary_first=array(0=>'请选择'),'status')}&nbsp;
					  	<input type="submit" name="submit" value="{L("查询")}" />&nbsp;&nbsp;
					 </td>
				</tr>
			</table>
			</form>
			
			<span><b>历史在读总人数：<font style="color:blue;">{$totalNum}</font></b></span><br />
			<span><b>当前在读人数：<font style="color:green;">{$studentNum}</font></b></span><br />
			<span><b>流失用户数：<font style="color:red;">{$lostNum}</font></b></span><br />
			
			<span title="当前在读人数/历史在读总人数"><b>总留存率(在读/总人数)：<font style="color:green;">{number_format($studentNum/$totalNum*100,1)}%</font></b></span>
			<span title="流失人数/历史在读总人数"><b>，流失率(流失/总人数)：<font style="color:red;">{number_format($lostNum/$totalNum*100)}%</font></b></span>
			<span title="人数差值（比率差值）"><b>，在读流失差：<font style="color:blue;">{number_format($studentNum-$lostNum)}({number_format(($studentNum-$lostNum)/$totalNum*100,1)}%)</font></b></span><br />
			
			<span title="小学当前在读人数/小学历史在读总人数"><b>小学留存率(小学在读/小学总人数)：<font style="color:green;">{number_format($primaryStudentNum/$primaryTotalNum*100,1)}%</font></b></span>
			<span title="小学流失人数/小学历史在读总人数"><b>，小学流失率(小学流失/小学总人数)：<font style="color:red;">{number_format($primaryLostNum/$primaryTotalNum*100)}%</font></b></span>
			<span title="人数差值（比率差值）"><b>，小学在读流失差：<font style="color:blue;">{number_format($primaryStudentNum-$primaryLostNum)}({number_format(($primaryStudentNum-$primaryLostNum)/$primaryTotalNum*100,1)}%)</font></b></span><br />
			
			<span title="初中当前在读人数/初中历史在读总人数"><b>初中留存率(初中在读/初中总人数)：<font style="color:green;">{number_format($middleStudentNum/$middleTotalNum*100,1)}%</font></b></span>
			<span title="初中流失人数/初中历史在读总人数"><b>，初中流失率(初中流失/初中总人数)：<font style="color:red;">{number_format($middleLostNum/$middleTotalNum*100)}%</font></b></span>
			<span title="人数差值（比率差值）"><b>，初中在读流失差：<font style="color:blue;">{number_format($middleStudentNum-$middleLostNum)}({number_format(($middleStudentNum-$middleLostNum)/$middleTotalNum*100,1)}%)</font></b></span><br />
			
			<span title="高中当前在读人数/高中历史在读总人数"><b>高中留存率(高中在读/高中总人数)：<font style="color:green;">{number_format($seniorStudentNum/$seniorTotalNum*100,1)}%</font></b></span>
			<span title="高中流失人数/高中历史在读总人数"><b>，高中流失率(高中流失/高中总人数)：<font style="color:red;">{number_format($seniorLostNum/$seniorTotalNum*100)}%</font></b></span>
			<span title="人数差值（比率差值）"><b>，初中在读流失差：<font style="color:blue;">{number_format($seniorStudentNum-$seniorLostNum)}({number_format(($seniorStudentNum-$seniorLostNum)/$seniorTotalNum*100,1)}%)</font></b></span>
			
			
			<h3></h3>
		  
			<div class="autoscroll">
				<table class="list issues">
					<thead>
						<tr>
							<th><a href="">{L("sid")}</a></th>
							<th><a href="">{L("姓名")}</a></th>
							<th><a href="">{L("出生日期")}</a></th>
							<th><a href="">{L("性别")}</a></th>
							<th><a href="">{L("入学日期")}</a></th>
							<th><a href="">{L("家庭住址")}</a></th>
							<th><a href="">{L("联系电话")}</a></th>
							<th><a href="">{L("QQ")}</a></th>
							<th><a href="">{L("在读学校")}</a></th>
							<th><a href="">{L("当前年级")}</a></th>
							<th><a href="">{L("报读渠道")}</a></th>
							<th><a href="">{L("在读")}</a></th>
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
							<td>{$data['sid']}</td>
							<td><a href="hr_student_view.php?sid={$data['sid']}">{$data['name']}</a></td>
							<td>{date('Y-m-d',strtotime($data['birth']))}</td>
							<td>{$sexAry[$data['sex']]}</td>
							<td>{date('Y-m-d',strtotime($data['enrollment_date']))}</td>
							<td style="text-align:left;">{$data['addr']}</td>
							<td>{$data['tel']}</td>
							<td>{$data['qq']}</td>
							<td style="text-align:left;">{$data['school']}</td>
							<td style="text-align:left;">{$DefineGradeAry[$data['grade']]}</td>
							<td>{$data['channel']}</td>
							<td>{if $data['status'] == 'y'}<font color="#ff0000">{L("是")}</font>{else}<font color="#0000ff">{L("否")}</font>{/if}</td>
							<td><a href="hr_student_view.php?sid={$data['sid']}">{L("更新")}</a></td>
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